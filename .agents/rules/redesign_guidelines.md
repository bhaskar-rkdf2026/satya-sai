# Page Redesign & Content Management Guidelines

When performing any page redesign or design modifications on this project, strictly follow these workflow rules:

1. **Live Website Inspection**:
   - Always check the live website ([https://sssutms.co.in/](https://sssutms.co.in/)) first to examine the live layout, content, data, and asset references for the target page.

2. **Missing Content, Data & Assets**:
   - Verify if any content, text, data, or images are present on the live site but missing in the local codebase. Update local files accordingly to match live content.

3. **Fallback Image & User Avatar Handling**:
   - If an image is missing on both local and live site, generate a relevant high-quality AI image asset.
   - If a person's photo/avatar is missing, use a standardized dummy user placeholder image.

4. **Data & Content Preservation**:
   - **Do NOT** change, remove, or modify existing content, text, or data present in the website. Preserve all actual information accurately.

5. **Local Asset Download Requirement**:
   - Do **NOT** use direct live links (`https://sssutms.co.in/...`) for images or PDF documents in the code.
   - Always download any required images or PDFs from the live website locally into the appropriate local assets/files directory, and update links to point to local relative paths.
