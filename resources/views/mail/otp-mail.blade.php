<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-base-200" style="margin: 0; padding: 20px;">
    <center class="wrapper" style="width: 100%; max-width: 600px; margin: 0 auto;">
        <!-- Email Card -->
        <div class="card bg-base-100" style="border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); padding: 32px;">
            <!-- Header -->
            <div class="text-center mb-8">
                <p class="text-base-content/70">Linkdeed Account Security Verification</p>
                <h1 class="text-2xl font-bold mb-2">Verify Your Email Address</h1>
            </div>

            <!-- Content -->
            <div class="space-y-6">
                <!-- OTP Code -->
                <div class="text-center">
                    <div class="bg-primary/10 rounded-xl p-4 inline-block">
                        <code style="font-size: 2.25rem; /* 36px */
                        font-weight: 700;
                        letter-spacing: 0.05em;
                        color: hsl(var(--p)); /* primary */
                        font-family: monospace;">
                {{$otp}}
                    </code>
                    </div>
                </div>

                <!-- Instructions -->
                <div class="text-center space-y-4">
                    <p class="text-base-content/90">
                        Enter this verification code in your browser to complete registration for:<br>
                        <strong class="text-primary">{{$email}}</strong>
                    </p>
                </div>

                <!-- Security Info -->
                <div class="text-center text-sm text-base-content/70 pt-6 border-t border-base-300">
                    <div class="flex items-center justify-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                             stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                        <span>This code will expire in 15 minutes</span>
                    </div>
                    <p class="mt-2">Didn't request this? Please ignore this email.</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-sm text-base-content/70 mt-6">
            <p>Sent by LinkDeed • created by shery.codes@gmail.com • Landhi 1, Karachi, Pakistan</p>
            <div class="mt-4">
                <a href="#" class="link link-primary">Help Center</a> • 
                <a href="#" class="link link-primary">Privacy Policy</a>
            </div>
            <p class="mt-4">© {{date('Y')}} JobPortal. All rights reserved.</p>
        </div>
    </center>
</body>
</html>