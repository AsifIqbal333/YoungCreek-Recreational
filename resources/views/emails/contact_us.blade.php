<!DOCTYPE html>
<html>

<head>
    <title>Contact Us Form Submission</title>
</head>

<body>
    <h1>New Contact Us Form Submission</h1>
    <p>A new contact form has been submitted with following details.</p>
    <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
    <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone Number:</strong> {{ $data['phone_number'] }}</p>
    <p><strong>Product Interest:</strong>
        {{-- @if (is_array($data['product_interest']))
            {{ implode(', ', $data['product_interest']) }}
        @else
            {{ $data['product_interest'] }}
        @endif --}}
    </p>
    <ul>
        @foreach ($data['product_interest'] as $interest)
            <li>{{ $interest }}</li>
        @endforeach
    </ul>
    <p><strong>Message:</strong> {{ $data['message'] }}</p>
    <p><strong>Organization Name:</strong> {{ $data['organization_name'] }}</p>
    <p><strong>Organization Type:</strong> {{ $data['organization_type'] }}</p>
    <p><strong>Budget:</strong> {{ $data['budget'] }}</p>
</body>

</html>
