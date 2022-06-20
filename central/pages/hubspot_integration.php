<?php
header('Location:form_submitted.html');

if (isset($_POST['insertdata'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $ph_no = $_POST['ph_no'];
    $cname = $_POST['cname'];
    $url = $_POST['url'];
    $date = $_POST['date'];
    $request = $_POST['request'];

    $contact_data = array(
        "fname" => $fname,
        "lname" => $lname,
        "email" => $email,
        "subject" => $subject,
        "ph_no" => $ph_no,
        "cname" => $cname,
        "url" => $url,
        "date" => $date,
        "request" => $request
    );
}


$arr = array(
    'properties' => array(
        array(
            'property' => 'fname',
            'value' => $contact_data["fname"]
        ),
        array(
            'property' => 'lname',
            'value' => $contact_data["lname"]
        ),
        array(
            'property' => 'email',
            'value' => $contact_data["email"]
        ),
        array(
            'property' => 'subject',
            'value' => $contact_data["subject"]
        ),
        array(
            'property' => 'ph_no',
            'value' => $contact_data["ph_no"]
        ),
        array(
            'property' => 'cname',
            'value' => $contact_data["cname"]
        ),
        array(
            'property' => 'url',
            'value' => $contact_data["url"]
        ),
        // array(
        //     'property' => 'date',
        //     'value' => $contact_data["date"]
        // ),
        array(
            'property' => 'request',
            'value' => $contact_data["request"]
        )
    )
);

$post_json = json_encode($arr);
$hapikey = "d3602416-c2c9-4fe8-ae7e-42ac603cec9c";
$endpoint = 'https://api.hubapi.com/contacts/v1/contact?hapikey=' . $hapikey;
$ch = @curl_init();
@curl_setopt($ch, CURLOPT_POST, true);
@curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
@curl_setopt($ch, CURLOPT_URL, $endpoint);
@curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = @curl_exec($ch);
$status_code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_errors = curl_error($ch);
@curl_close($ch);
echo "curl Errors: " . $curl_errors;
echo "\nStatus code: " . $status_code;
echo "\nResponse: " . $response;
