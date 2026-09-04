# Website Redesign Guidelines & Content Integrity Rules

Whenever modifying, designing, or redesigning pages for the SSSUTMS website (`d:\xampp\htdocs\sssu\satya-sai`):

1. **Live Website Verification**:
   - Check the live website (https://sssutms.co.in/) first.
   - Verify if any content, data, or images are missing locally compared to the live website, and sync/update locally.

2. **Missing Images Handling**:
   - If images are missing even on the live site, create relevant custom images.
   - If a person's image is missing (e.g., faculty, officials, board members), use a dummy user placeholder image.

3. **Content Integrity**:
   - Do NOT change any existing text, data, or content on the current website unless explicitly requested.

4. **Local Asset Storage (No Hotlinking)**:
   - Always download any images, assets, or PDFs locally into the repository assets directory before referencing them in code.
   - Do NOT use direct external live links in `src` or `href` attributes for assets.
