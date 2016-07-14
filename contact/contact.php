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

	$errors     = ' ';
	$fieldsName = '';


	if ( Input::exist() ) {

		$validate   = new Validate();
		$validation = $validate->check( $_POST, array(
			'name'          => array(
				'required' => true,
				'min'      => 2,
				'max'      => 20,
				'name'     => 'Name'
			),
			'email'         => array(
				'required'     => true,
				'isValidEmail' => true,
				'name'         => 'Email'
			),
			'phone'         => array(
				'required' => true,
				'min'      => 9,
				'numeric'  => true,
				'name'     => 'Phone'
			),
			'postcodeEvent' => array(
				'required' => true,
				'min'      => 3,
				'name'     => 'Event location'
			),
			'datepicker'    => array(
				'required' => true,
				'name'     => 'Event date'
			),
			'enquiries'     => array(
				'required' => true,
				'name'     => 'Enquiries'
			)
		) );
		if ( $validation->passed() ) {
			if ( empty( $_SESSION['6_letters_code'] ) ||
			     strcasecmp( $_SESSION['6_letters_code'], Input::get('6_letters_code')) != 0
			) {
				//Note: the captcha code is compared case insensitively.
				//if you want case sensitive match, update the check above to
				// strcmp()
				$errors = "The captcha code does not match!";
			} else {
				echo 'Validation passed !';


				// START SENDING EMAIL
				//error_reporting(E_ALL);
				error_reporting( E_STRICT );

				date_default_timezone_set( 'Europe/London' );

				require_once('includes/class.phpmailer.php');
				include("includes/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

				$mail = new PHPMailer();

				$body = '
	<html>
	<head>
	<title>Genial Ideea</title>
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
				<td>' . Input::get('name') . '</td>
			</tr>
			<tr>
				<th>Email: </th>
				<td>' . Input::get('email') . '</td>
			</tr>
			<tr>
				<th>Phone: </th>
				<td>' . Input::get('phone') . '</td>
			</tr>
			<tr>
				<th>Postcode of event: </th>
				<td>' . Input::get('postcodeEvent') . '</td>
			</tr>
			<tr>
				<th>Date of event: </th>
				<td>' . Input::get('datepicker') . '</td>
			</tr>
			<tr>
				<th>Event start time: </th>
				<td>' . Input::get('timeEvent') . '</td>
			</tr>
			<tr>
				<th>Enquiry: </th>
				<td>' . Input::get('enquiries') . '</td>
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
				$mail->Username = "bookings@london-airport-minicab.co.uk"; // SMTP account username
				$mail->Password = "Bucegi117";        // SMTP account password

				$mail->SetFrom( 'bookings@london-airport-minicab.co.uk', 'Magic' );

				$mail->AddReplyTo( 'bookings@london-airport-minicab.co.uk', 'Magic' );

				$mail->Subject = "Enquiry Russell Magic Website";

				$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

				$mail->MsgHTML( $body );

				$mail->AddAddress( 'ciupicu77@yahoo.com', 'Russell Magic Website' );
				$mail->addBCC( 'ciupicu_bc@yahoo.com', 'Russell Magic Website' );

				if ( ! $mail->Send() ) {
					echo '<br><div id="e_message">Message not send. Try again or call us.</div>';
				} else {
					echo '<br><div id="v_message">Your message has been send successfully.</div>';
				}
				// END SENDING EMAIL
			}
		} else {
			foreach ( $validation->getError() as $err => $value) {
				$errors .= $value . '<br>';
			}
			foreach ( $validation->getItemName() as $err => $value) {
				$fieldsName .= $value;
			}
		}

	}

	?>
</head>

<body>
<div id="container">
	<h1>Contact</h1>

	<form action="contact.php" method="post" onsubmit="return validate(this);" name="form" id="form">
		<table>
			<tr>
				<td>
					<p>Name:*</p>
				</td>
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
						value="<?php echo Input::get( 'name' ); ?>"
						name="name"
						/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<p>Email:*</p>
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
						value="<?php echo Input::get( 'email' ); ?>"
						name="email"
						/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<p>Phone:*</p>
				</td>
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
						value="<?php echo Input::get( 'phone' ); ?>"
						name="phone"
						/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<p>Postcode of event:*</p>
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
						value="<?php echo Input::get( 'postcodeEvent' ); ?>"
						name="postcodeEvent"
						/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<p>Date of event:*</p>
				</td>
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
						value="<?php echo Input::get( 'datepicker' ); ?>"
						id="datepicker"
						name="datepicker"
						readonly
						>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<p>Event start time:</p>
				</td>
				<td>
					<input class="input_text" type="time" value="<?php echo Input::get( 'timeEvent' ); ?>"
					       name="timeEvent"/>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<p id="enquiries">Other enquiries:*</p>
				</td>
				<td>
					<textarea
						class="
							<?php
						if ( strpos( $fieldsName, 'enquiries' ) !== false ) {
							echo 'fieldError';
						} else {
							echo 'fieldValid';
						}
						?>"
						name="enquiries"><?php echo Input::get( 'enquiries' ); ?></textarea>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>

				</td>
				<td>
					<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'><br>
					<label for='message'>Enter the code above here :</label><br>
					<input id="6_letters_code" name="6_letters_code" type="text"><br>
					<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh
					</small>
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="submit" name="submit" style="float:right; width: 80px;" value="Submit"/>
				</td>
				<td>
				</td>
			</tr>
		</table>
	</form>
	<div>
		<?php echo $errors; ?>
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