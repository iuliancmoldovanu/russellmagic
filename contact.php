<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="description" content="Welcome to Russell's Magic contact page">
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta name="revisit-after" content="1 day">
	<meta name="verify-v1" content="">
	<title>Russells Magic contact</title>
	<link rel="alternate" href="http://russellsmagic.co.uk//" hreflang="x-default"/>
	<link href='http://fonts.googleapis.com/css?family=Peralta|Lily+Script+One|Jacques+Francois' rel='stylesheet'
	      type='text/css'>
	<link rel="stylesheet" href="css/jquery-ui-1.8.17.custom.css">
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<?php
	session_start();
	require_once( 'classes/Input.php' );
	require_once( 'classes/Validate.php' );

	$errors      = ' ';
	$fieldsName  = '';
	$inputFields = true;
	$message     = '';

	if ( Input::exist() ) {

		$validate   = new Validate();
		$validation = $validate->check( $_POST, array(
			'name'           => array(
				'required' => true,
				'min'      => 2,
				'max'      => 20,
				'name'     => 'Name'
			),
			'email'          => array(
				'required'     => true,
				'isValidEmail' => true,
				'name'         => 'Email'
			),
			'phone'          => array(
				'required' => true,
				'min'      => 9,
				'numeric'  => true,
				'name'     => 'Phone'
			),
			'postcodeEvent'  => array(
				'required' => true,
				'min'      => 3,
				'name'     => 'Event location'
			),
			'datepicker'     => array(
				'required' => true,
				'name'     => 'Event date'
			),
			'enquiries'      => array(
				'required' => true,
				'min'      => 20,
				'name'     => 'Enquiries'
			),
			'6_letters_code' => array(
				'required' => true,
				'captcha'  => true,
				'name'     => 'Captcha code'
			)
		) );
		if ( $validation->passed() ) {

			$inputFields = false;
			// START SENDING EMAIL
			//error_reporting(E_ALL);
			error_reporting( E_STRICT );

			date_default_timezone_set( 'Europe/London' );

			require_once( 'includes/class.phpmailer.php' );
			include( "includes/class.smtp.php" ); // optional, gets called from within class.phpmailer.php if not already loaded

			$mail = new PHPMailer();

			$body = '
	<html>
	<head>
	<title>Russell Magic</title>
	<style type="text/css">
	table{
		border-collapse:collapse;
	}
	th,td{
		border:solid 1px #000;
		padding:7px;
	}
	td{
		text-align:center;
	}
	</style>
	</head>
	<body>
	<div id="s_message">
		<table>
			<tr>
				<th>Name: </th>
				<td>' . Input::get( 'name' ) . '</td>
			</tr>
			<tr>
				<th>Email: </th>
				<td>' . Input::get( 'email' ) . '</td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td>' . Input::get( 'phone' ) . '</td>
			</tr>
			<tr>
				<th>Postcode of event: </th>
				<td>' . Input::get( 'postcodeEvent' ) . '</td>
			</tr>
			<tr>
				<th>Date of event: </th>
				<td>' . Input::get( 'datepicker' ) . '</td>
			</tr>
			<tr>
				<th>Event start time: </th>
				<td>' . Input::get( 'timeEvent' ) . '</td>
			</tr>
			<tr>
				<th>Enquiry: </th>
				<td>' . Input::get( 'enquiries' ) . '</td>
			</tr>
		</table>
	</div>
	</body>
	</html>';
			$body = eregi_replace( "[\]", '', $body );

			$mail->IsSMTP(); // telling the class to use SMTP

			$mail->SMTPAuth = true;                  // enable SMTP authentication
			$mail->Host     = "smtpout.europe.secureserver.net"; // sets the SMTP server
			$mail->Port     = 80;                    // set the SMTP port for the GMAIL server
			$mail->Username = "xxx@xxx.xx"; // SMTP account username
			$mail->Password = "xxx";        // SMTP account password

			$mail->SetFrom( 'xxx@xxx.xx', 'Magic' );

			$mail->AddReplyTo( 'xxx@xxx.xx', 'Magic' );

			$mail->Subject = "Enquiry Russell Magic Website";

			$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

			$mail->MsgHTML( $body );

			$mail->AddAddress( 'xxx@xxx.xx', 'Russell Magic Website' );
			$mail->addBCC( 'xxx@xxx.xx', 'Russell Magic Website' );

			if ( ! $mail->Send() ) {
				$message = '<span style="color: #FF3300;">Message not send. Try again or call us.</span><br>';
			} else {
				$message = '<span style="color: forestgreen;">Your message has been send successfully.</span><br>';
			}
			// END SENDING EMAIL
		} else {
			foreach ( $validation->getError() as $err => $value ) {
				$errors .= $value . '<br>';
			}
			foreach ( $validation->getItemName() as $err => $value ) {
				$fieldsName .= $value;
			}
		}

	}

	?>
</head>

<body>
<img src="images/winter.jpg" class="bg">
<?php include( 'includes/header.php' ); ?>
<div id="container">
	<h1>Contact</h1>

	<form action="" method="post" id="form">
		<div id="contact_right_box">
			<img src="images/contact_2.png" width="200" height="200" alt="contact"/>

			<p>Mobile: 07868 746 089</p>

			<p>Home: 0208 677 2295</p>

			<p>russellsmagic@gmail.com</p>

			<p>Address: 120A Pendle Road, Streatham, London, SW16 6RY</p>
			<br/>
			<iframe
				width="250"
				height="150"
				frameborder="0" style="border:1"
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9951.993606075395!2d-0.130868!3d51.421456!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xad28012279922b63!2sRussell&#39;s+Magic!5e0!3m2!1sen!2suk!4v1429267948782">
			</iframe>

		</div>

		<table>
			<tr>
				<td colspan="2"><?php echo $message; ?></td>
			</tr>
			<tr>
				<td><label for="name">Name*</label></td>
				<td><label for="email">Email*</label></td>
			</tr>
			<tr>
				<td>
					<input
						class="
							<?php
						if ( strpos( $fieldsName, 'name' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						type="text"
						value="<?php if ( $inputFields ) {
							echo Input::get( 'name' );
						} ?>"
						name="name"
						id="name"
						/>
				</td>
				<td>
					<input
						class="
							<?php
						if ( strpos( $fieldsName, 'email' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						type="text"
						value="<?php if ( $inputFields ) {
							echo Input::get( 'email' );
						} ?>"
						name="email"
						/>
				</td>
			</tr>
			<tr>
				<td><label for="phone">Phone*</label></td>
				<td><label for="postcodeEvent">Postcode of event*</label></td>
			</tr>
			<tr>
				<td>
					<input
						class="
							<?php
						if ( strpos( $fieldsName, 'phone' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						type="text"
						value="<?php if ( $inputFields ) {
							echo Input::get( 'phone' );
						} ?>"
						name="phone"
						id="phone"
						/>
				</td>
				<td>
					<input
						class="
							<?php
						if ( strpos( $fieldsName, 'postcodeEvent' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						type="text"
						value="<?php if ( $inputFields ) {
							echo Input::get( 'postcodeEvent' );
						} ?>"
						name="postcodeEvent"
						id="postcodeEvent"
						/>
				</td>
			</tr>
			<tr>
				<td><label for="datepicker">Event date*</label></td>
				<td><label for="timeEvent">Event start time</label></td>
			</tr>
			<tr>
				<td>
					<input
						class="
							<?php
						if ( strpos( $fieldsName, 'datepicker' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						type="text"
						value="<?php if ( $inputFields ) {
							echo Input::get( 'datepicker' );
						} ?>"
						id="datepicker"
						name="datepicker"
						readonly
						>
				</td>
				<td>
					<input class="input_text" type="time" value="<?php if ( $inputFields ) {
						echo Input::get( 'timeEvent' );
					} ?>"
					       name="timeEvent" id="timeEvent">
				</td>
			</tr>
			<tr>
				<td colspan="2"><label for="enquiries">Other enquiries*</label></td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea
						class="
							<?php
						if ( strpos( $fieldsName, 'enquiries' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						name="enquiries"
						id="enquiries"><?php if ( $inputFields ) {
							echo Input::get( 'enquiries' );
						} ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'>
					<br>
					Click <a href='javascript: refreshCaptcha();'>here</a> to refresh the image
				</td>
			</tr>
			<tr>
				<td>
					<label for='message'>Enter the code above here :</label><br>
					<input
						class="
							<?php
						if ( strpos( $fieldsName, '6_letters_code' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						id="6_letters_code"
						name="6_letters_code"
						type="text">
				</td>
				<td>
					<input type="submit" name="submit" style="float:right; width: 80px;" value="Submit"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div id="showErrors">
						<?php echo $errors; ?>
					</div>
				</td>
			</tr>
		</table>

	</form>

	<br/>
	<?php include( 'includes/footer.php' ); ?>
</div>
<script>window.jQuery || document.write('<script src="jquery/1.7.1/jquery.min.js"><\/script>')</script>
<script src="jquery/jquery-ui-1.8.17.custom.min.js"></script>
<script>
	$(function () {
		$("#datepicker").datepicker({
			showOn: "button",
			buttonImage: "css/images/calendar.png",
			buttonImageOnly: true,
			"dateFormat": 'D, dd M yy',
			'minDate': '1',
			maxDate: "+45d"
		});
	});

	function refreshCaptcha() {
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0, img.src.lastIndexOf("?")) + "?rand=" + Math.random() * 1000;
	}
</script>
</body>
</html>