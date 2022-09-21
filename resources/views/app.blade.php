<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    {{-- <title>Laravel with Inertia</title> --}}
    @vite
    @routes
    @inertiaHead

    <style>
        body>div.skiptranslate{
            display: none;
            visibility: hidden; 
            height: 0;
            width:0;
        }

        #google_translate_element img{
            display:none;
        }

        body {
            top: 0 !important;
        }
    </style>

</head>

<body class="antialiased bg-gray-900">
    @inertia
    <x-translations />
    @guest
        <x-live-chat />
    @else
        @if (!auth()?->user()?->is_admin)
            <x-live-chat />
        @endif
    @endguest

    <script
        type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    ></script>

    <script type="text/javascript">
        window.googleTranslateElementInit = () => {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                // layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>
</body>

</html>
