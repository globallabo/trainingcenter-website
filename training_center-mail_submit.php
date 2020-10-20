<!DOCTYPE html>
<html>
<head>
	<title>Form Submitted</title>
</head>
<body>

<?php

	if(isset($_POST['submit'])) {

		$to = "labo@5star-english.jp"; // this is the recipient's e-mail address
    $from = $_POST['email'] ?? "無記入"; // this is the sender's e-mail address
    $name = $_POST['name'] ?? "無記入";
    $phonetic = $_POST['name-kana'] ?? "無記入";
    $subject = "Linove Training Center Website Form Submission";
    $form_message = $_POST['message'] ?? "メッセージはありません。";
    $message = $name . " (" . $phonetic . "), with the e-mail address " . $from . " wrote the following:" . "\n\n" . $form_message . "\n\n";

		$message .= "以下の項目が選択されました。\n\n";
		$application_details = $_POST['application-details'] ?? NULL;
		if ($application_details) {
			$message .= "お申込み内容:\n\n";
			foreach ($application_details as $value) {
				$message .= $value. "\n";
			}
		}
		echo "\n";
		$desired_course = $_POST['desired-course'] ?? NULL;
		if ($desired_course) {
			$message .= "ご希望のコース:\n\n";
			foreach ($desired_course as $value) {
				$message .= $value. "\n";
			}
		}

    $headers = "From:" . $from;

		mail($to,$subject,$message,$headers);
    echo "<h1>送信完了</h1>";
    echo "<p>お問い合わせありがとうございます。メッセージが正常に送信されました。折り返し担当より回答させていただきますので、今しばらくお待ちください。</p>";

	}
	else {
		echo "<h1>問題が発生しました</h1>";
	}
?>
	<p><a href="index.html">前のページに戻ってください</a></p>
</body>
</html>
