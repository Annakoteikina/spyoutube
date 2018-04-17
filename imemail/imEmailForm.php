<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('', @$_POST['imObjectForm_2_1'], '', false);
	$form->setField('', @$_POST['imObjectForm_2_2'], '', false);
	$fileResult = $form->setFile('', $_FILES['imObjectForm_2_3'], $imSettings['general']['public_folder'], '', '');
	if ($fileResult == -1) { die(imPrintError('Cannot send file: ')); }
	if ($fileResult < -1) { die(imPrintError('В поле "" указан неверный формат.')); }

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != '9ABFA90D65DDA494C01228101CAE435F' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner('lukahmel88@gmail.com', 'lukahmel88@gmail.com', '', '', false);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file