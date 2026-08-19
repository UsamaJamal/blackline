import os
import re

def process_views(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith('.blade.php'):
                filepath = os.path.join(root, file)
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()

                # Find all img tags
                # <img ... src="{{ asset('images/file-name.ext') }}" ... >
                
                def img_replacer(match):
                    img_tag = match.group(0)
                    
                    # Extract the static file path if it exists
                    src_match = re.search(r'''src=['"]\{\{\s*asset\(['"]([^'"]+)['"]\)\s*\}\}['"]''', img_tag)
                    if not src_match:
                        # Fallback for plain src="images/file.png"
                        src_match = re.search(r'''src=['"]([^'"]+)['"]''', img_tag)
                        
                    if not src_match:
                        return img_tag
                        
                    src_val = src_match.group(1)
                    
                    # Only process if there are no variables in the src
                    if '$' in src_val or '{' in src_val:
                        return img_tag
                        
                    filename = src_val.split('/')[-1]
                    name_without_ext = filename.rsplit('.', 1)[0]
                    
                    # Create normal text: replace hyphens and underscores with space
                    normal_text = name_without_ext.replace('-', ' ').replace('_', ' ').strip()
                    
                    # Create title text: Capitalize first letters
                    title_text = ' '.join(word.capitalize() for word in normal_text.split())
                    
                    # Remove existing alt and title
                    new_tag = re.sub(r'''\s+alt=['"][^'"]*['"]''', '', img_tag)
                    new_tag = re.sub(r'''\s+title=['"][^'"]*['"]''', '', new_tag)
                    
                    # Add new alt and title before the closing >
                    new_tag = re.sub(r'''\s*>$''', f''' alt="{normal_text}" title="{title_text}">''', new_tag)
                    # If self-closing />
                    new_tag = re.sub(r'''\s*/>$''', f''' alt="{normal_text}" title="{title_text}"/>''', new_tag)
                    
                    return new_tag

                # Match <img ... > and <img ... />
                new_content = re.sub(r'<img[^>]+>', img_replacer, content)

                if new_content != content:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                    print(f"Updated: {filepath}")

if __name__ == '__main__':
    process_views('resources/views')
