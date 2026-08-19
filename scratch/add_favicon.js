const fs = require('fs');
const path = require('path');

function processViews(directory) {
    const files = fs.readdirSync(directory);
    
    for (const file of files) {
        const filepath = path.join(directory, file);
        const stat = fs.statSync(filepath);
        
        if (stat.isDirectory()) {
            processViews(filepath);
        } else if (file.endsWith('.blade.php')) {
            let content = fs.readFileSync(filepath, 'utf8');
            
            // If it already has the favicon, skip
            if (content.includes('blacline-marketing-favicon.png')) {
                continue;
            }
            
            // Check if file has <head>
            if (content.includes('<head>')) {
                const faviconLink = `\n<link rel="icon" type="image/png" href="{{ asset('images/blacline-marketing-favicon.png') }}">`;
                // Insert after <head>
                content = content.replace(/<head>/i, '<head>' + faviconLink);
                
                fs.writeFileSync(filepath, content, 'utf8');
                console.log('Added favicon to:', filepath);
            }
        }
    }
}

processViews(path.join(__dirname, 'resources', 'views'));
