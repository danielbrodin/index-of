<?php
require_once('settings.php');

$files = [];
$dirs = [];

$root = $_SERVER['DOCUMENT_ROOT'];
$current_dir = $_SERVER['REQUEST_URI'];
$cwd = $root . $current_dir;

$dir = opendir($cwd);

while(($file = readdir($dir)) !== false) {
	if(($file != ".") && ($file != "..") && !in_array($file, $ignore)) {
		if(is_dir($cwd . $file)) {
			$dirs[] = $file;
		} else {
			$files[] = $file;
		}
	}
}

$breadcrumb = explode('/', $current_dir);
array_pop($breadcrumb);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">
		<title><?php echo $current_dir ?></title>
		<link rel="stylesheet" href="/index-of/css/file-icons.css">
		<link rel="stylesheet" href="/index-of/css/style.css">
	</head>
	<body class="<?php print $colorless_icons ? 'file-icons-colourless' : '' ?>">
		<ul class="breadcrumb">
			<?php $bc_url = '/' ?>
			<?php foreach($breadcrumb as $i => $crumb): ?>
				<?php if($crumb == '') $crumb = 'Index'; ?>
				<li class="breadcrumb-item">
					<?php if($i == 0): ?>
						<a href="<?php print $bc_url ?>" class="breadcrumb-link"><?php print $crumb ?></a>
					<?php else: ?>
						<a href="<?php print $bc_url . $crumb ?>" class="breadcrumb-link"><?php print $crumb ?></a>
						<?php $bc_url .= "$crumb/" ?>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<ul class="file-list">
			<?php foreach($dirs as $dir): ?>
				<li class="file-list-item">
					<a href="<?php print $dir ?>" class="file-list-link dir">
						<span class="octicons icon-file-directory" data-name="<?php print $dir ?>"></span><?php print $dir ?>
					</a>
				</li>
			<?php endforeach; ?>

			<?php foreach($files as $file): ?>
				<li class="file-list-item">
					<a href="<?php print $file ?>" class="file-list-link">
						<span class="icon-file-text" data-name="<?php print $file ?>"></span><?php print $file ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>