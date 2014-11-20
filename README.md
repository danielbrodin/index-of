# Index-of

A custom localhost index page to mostly get a better mobile experience.

## Install
Clone the repo: `git clone git://github.com/danielbrodin/index-of` to the root of your localhost in a folder called `index-of`

## Use
Open your `httpd.conf` (for MAMP it's located in `Applications/MAMP/conf/apache`) and find the `dir_module` row and add `/index-of/index-of.php`. Make sure the
```
<IfModule dir_module>
	DirectoryIndex index.html index.php /index-of/index-of.php
</IfModule>
```

## Settings
- `(array) $ignore:` Files that shouldn't be listed
- `(boolean) $colorless_icons:` `true` if you want colorless icons

## Acknowledgments
The filetype icons are shamelessly taken and wouldn't have been there without [DanBrooker/file-icons](https://github.com/DanBrooker/file-icons), a really nice package for Atom.