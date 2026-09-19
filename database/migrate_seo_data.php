<?php
/**
 * Database Migration Script for Global SEO & Page Indexing
 * Migrates data/seo_indexing.json into MySQL `sssutms_db`
 */

require_once __DIR__ . '/../config.php';

echo "=== SSSUTMS Global SEO Database Migration ===\n\n";

$db = get_db();
if (!$db) {
    echo "❌ Error: Could not connect to MySQL Database.\n";
    exit(1);
}

echo "✓ Database connected successfully.\n";

try {
    // 1. Create `seo_global_settings` table
    $db->exec("
        CREATE TABLE IF NOT EXISTS `seo_global_settings` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `global_robots_default` VARCHAR(50) NOT NULL DEFAULT 'noindex, nofollow',
            `google_verification` VARCHAR(255) NULL,
            `bing_verification` VARCHAR(255) NULL,
            `canonical_base` VARCHAR(255) NOT NULL DEFAULT 'https://www.sssutms.ac.in',
            `meta_author` VARCHAR(255) NOT NULL DEFAULT 'Sri Satya Sai University of Technology and Medical Sciences',
            `sitemap_url` VARCHAR(255) NOT NULL DEFAULT 'https://www.sssutms.ac.in/sitemap.xml',
            `custom_robots_txt` TEXT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");
    echo "✓ Table `seo_global_settings` created/verified.\n";

    // 2. Create `seo_page_rules` table
    $db->exec("
        CREATE TABLE IF NOT EXISTS `seo_page_rules` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `page_url` VARCHAR(255) UNIQUE NOT NULL,
            `directive` VARCHAR(50) NOT NULL DEFAULT 'noindex, nofollow',
            `page_title` VARCHAR(255) NULL,
            `category` VARCHAR(100) NULL,
            `custom_schema` LONGTEXT NULL,
            `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX `idx_page_url` (`page_url`),
            INDEX `idx_directive` (`directive`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // Add custom_schema column if table existed without it
    try {
        $db->exec("ALTER TABLE `seo_page_rules` ADD COLUMN `custom_schema` LONGTEXT NULL AFTER `category`");
    } catch (Exception $colEx) {
        // Column already exists
    }

    echo "✓ Table `seo_page_rules` created/verified.\n";

    // 3. Load existing data from data/seo_indexing.json
    $jsonFile = DATA_DIR . '/seo_indexing.json';
    $jsonData = [];
    if (file_exists($jsonFile)) {
        $raw = file_get_contents($jsonFile);
        $jsonData = json_decode($raw, true) ?: [];
    }

    $globalRobotsDefault = $jsonData['global_robots_default'] ?? 'noindex, nofollow';
    $googleVerification  = $jsonData['google_verification'] ?? '';
    $bingVerification    = $jsonData['bing_verification'] ?? '';
    $canonicalBase       = $jsonData['canonical_base'] ?? 'https://www.sssutms.ac.in';
    $metaAuthor          = $jsonData['meta_author'] ?? 'Sri Satya Sai University of Technology and Medical Sciences';
    $sitemapUrl          = $jsonData['sitemap_url'] ?? 'https://www.sssutms.ac.in/sitemap.xml';
    $customRobotsTxt     = $jsonData['custom_robots_txt'] ?? "User-agent: *\nDisallow: /admin/\nDisallow: /includes/\nDisallow: /scratch/\nSitemap: https://www.sssutms.ac.in/sitemap.xml";
    $pageRules           = $jsonData['page_rules'] ?? [];
    $pageSchemas         = $jsonData['page_schemas'] ?? [];

    // 4. Seed/Update Global Settings
    $stmt = $db->query("SELECT id FROM `seo_global_settings` LIMIT 1");
    $existingSetting = $stmt->fetch();

    if ($existingSetting) {
        $updateStmt = $db->prepare("
            UPDATE `seo_global_settings` 
            SET `global_robots_default` = :global_robots_default,
                `google_verification`   = :google_verification,
                `bing_verification`     = :bing_verification,
                `canonical_base`        = :canonical_base,
                `meta_author`           = :meta_author,
                `sitemap_url`           = :sitemap_url,
                `custom_robots_txt`     = :custom_robots_txt
            WHERE `id` = :id
        ");
        $updateStmt->execute([
            ':global_robots_default' => $globalRobotsDefault,
            ':google_verification'   => $googleVerification,
            ':bing_verification'     => $bingVerification,
            ':canonical_base'        => $canonicalBase,
            ':meta_author'           => $metaAuthor,
            ':sitemap_url'           => $sitemapUrl,
            ':custom_robots_txt'     => $customRobotsTxt,
            ':id'                    => $existingSetting['id']
        ]);
        echo "✓ Global SEO settings updated in DB.\n";
    } else {
        $insertStmt = $db->prepare("
            INSERT INTO `seo_global_settings` 
            (`global_robots_default`, `google_verification`, `bing_verification`, `canonical_base`, `meta_author`, `sitemap_url`, `custom_robots_txt`)
            VALUES (:global_robots_default, :google_verification, :bing_verification, :canonical_base, :meta_author, :sitemap_url, :custom_robots_txt)
        ");
        $insertStmt->execute([
            ':global_robots_default' => $globalRobotsDefault,
            ':google_verification'   => $googleVerification,
            ':bing_verification'     => $bingVerification,
            ':canonical_base'        => $canonicalBase,
            ':meta_author'           => $metaAuthor,
            ':sitemap_url'           => $sitemapUrl,
            ':custom_robots_txt'     => $customRobotsTxt
        ]);
        echo "✓ Global SEO settings inserted into DB.\n";
    }

    // 5. Seed Page Rules & Schemas
    $ruleStmt = $db->prepare("
        INSERT INTO `seo_page_rules` (`page_url`, `directive`, `custom_schema`)
        VALUES (:page_url, :directive, :custom_schema)
        ON DUPLICATE KEY UPDATE 
            `directive` = :directive_update,
            `custom_schema` = COALESCE(:custom_schema_update, `custom_schema`)
    ");

    $migratedCount = 0;
    foreach ($pageRules as $url => $directive) {
        $cleanUrl = ltrim(str_replace('\\', '/', $url), '/');
        if (!empty($cleanUrl)) {
            $schemaVal = $pageSchemas[$cleanUrl] ?? null;
            $ruleStmt->execute([
                ':page_url'              => $cleanUrl,
                ':directive'             => $directive,
                ':custom_schema'         => $schemaVal,
                ':directive_update'      => $directive,
                ':custom_schema_update'  => $schemaVal
            ]);
            $migratedCount++;
        }
    }

    // Also migrate any schemas that might not have explicit page_rules
    if (!empty($pageSchemas)) {
        foreach ($pageSchemas as $url => $schema) {
            $cleanUrl = ltrim(str_replace('\\', '/', $url), '/');
            if (!empty($cleanUrl) && !isset($pageRules[$cleanUrl])) {
                $ruleStmt->execute([
                    ':page_url'              => $cleanUrl,
                    ':directive'             => $globalRobotsDefault,
                    ':custom_schema'         => $schema,
                    ':directive_update'      => $globalRobotsDefault,
                    ':custom_schema_update'  => $schema
                ]);
            }
        }
    }

    echo "✓ Migrated {$migratedCount} page rules & schemas into table `seo_page_rules`.\n";

    // Summary query
    $totalRules = $db->query("SELECT COUNT(*) FROM `seo_page_rules`")->fetchColumn();
    echo "\n=== Migration Finished Successfully ===\n";
    echo "Total active page rules in DB: {$totalRules}\n";

} catch (Exception $e) {
    echo "❌ Migration Error: " . $e->getMessage() . "\n";
    exit(1);
}
