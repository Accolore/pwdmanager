<?php
echo implode($delimiter, $fields);
echo $new_line;
foreach ($items as $item) {
	echo implode($delimiter, $item);
	echo $new_line;
}
