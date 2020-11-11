<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>5starバイリンガル保育士養成センター</title>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>

    <header>
      <!-- masthead -->
      <!-- main logo -->
      <div id="logobar">
        <img src="images/logo.png" alt="5starバイリンガル保育士養成センター" width="386" height="80" />
        <!-- linove logo and slogan -->
        <div id="slogan">
          <img src="images/linove.png" alt="Linove" width="94" height="23" />
          <p class="jp">人を育て、未来を育てる</p>
          <p class="en">Advancing People, Advancing the Future</p>
        </div>
      </div>

    </header>

    <main>

      <section id="form-submitted">

<?php

	if(isset($_POST['submit'])) {
		// Check for the honeypot input field meant to catch bots
		if(!empty($_POST['website']) or preg_match('/http|www/i',$_POST['message'])) {
			// Give an error message
			echo "<h1>問題が発生しました</h1>";
			echo "<p>URLを含むメッセージは許可されていません。</p>";
			echo "<p><a class=\"button-back\" href=\"javascript:history.back();\">前のページに戻ってください</a></p>";
		}
		else {
			$to = "labo@5star-english.jp"; // this is the recipient's e-mail address
			// $to = "chris@5star-english.jp"; // use this for testing
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
			echo "<p><a class=\"button-back\" href=\"index.html\">前のページに戻ってください</a></p>";
		}
	}
	else {
		echo "<h1>問題が発生しました</h1>";
		echo "<p><a class=\"button-back\" href=\"javascript:history.back();\">前のページに戻ってください</a></p>";
	}
?>

		</section>
	</main>

</body>
</html>
