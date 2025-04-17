<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    http_response_code(405);
    die(405);
}

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$page_title = "Full Stack Developer | " . config('app.name');
$page_description = "Full stack developer with a passion for learning and creating websites and applications.";
$page_keywords = [
    "Full Stack Developer",
    "Web Developer",
    "Full Stack Engineer",
    "PHP Developer"
];

// Build the page
try {
    $head = getAndReplace('includes/head', [
        'title' => $page_title,
        'description' => $page_description,
        'keywords' => implode(', ', $page_keywords),
    ]);
} catch (\Exception $exception) {
    http_response_code(500);
    echo $exception->getMessage();
    die(500);
}

?>

<html lang="en">

<?php echo $head ?>

<body>

<header class="w-full flex items-center justify-center py-10 absolute z-10">
    <div class="w-5/6 md:w-11/12 max-w-[1200px] flex items-center justify-between">
        <div class="flex items-center justify-start gap-x-1 hover:gap-x-2 transition-all ease-in-out duration-100 cursor-pointer">
            <p class="text-5xl md:text-3xl font-black text-neutral-800">K<span class="hidden md:inline">yle</span></p>
            <p class="text-5xl md:text-3xl font-black text-neutral-800">R<span class="hidden md:inline">oss</span></p>
            <p class="text-5xl md:text-3xl font-black text-neutral-800">B<span class="hidden md:inline">easley</span></p>
        </div>

        <nav class="hidden md:flex items-center justify-end gap-x-6">
            <a class="font-bold relative after:absolute after:-bottom-2 after:left-1/2 after:h-[2px] after:w-0 after:bg-yellow-500 after:transition-all after:duration-100 after:ease-in-out hover:after:left-0 hover:after:w-full" href="./projects">Projects</a>
            <a class="font-bold relative after:absolute after:-bottom-2 after:left-1/2 after:h-[2px] after:w-0 after:bg-yellow-500 after:transition-all after:duration-100 after:ease-in-out hover:after:left-0 hover:after:w-full" href="./blog">Blog</a>
            <a class="font-bold text-neutral-800 bg-yellow-500 px-8 py-2 flex items-center justify-center rounded-sm hover:shadow-md cursor-pointer">Hire Me</a>
        </nav>
    </div>
</header>

<section class="w-full relative flex items-center justify-center z-0">
    <!-- Background pic -->
    <img class="-z-10 h-full w-full absolute top-0 left-0 opacity-35 object-cover" src="./src/images/bluebonnets.jpg" alt="Field of Texas Bluebonnets" />

    <!-- Text content -->
    <div class="w-5/6 md:w-11/12 max-w-[1200px] flex flex-col md:flex-row items-center pt-50 pb-20 gap-20">
        <div class="w-full flex flex-col">
            <p class="text-3xl md:text-4xl font-bold text-center md:text-left">Full stack developer with a passion for learning, creating websites, and building applications.</p>

            <div class="flex items-center mt-10 gap-20 justify-center md:justify-start">
                <!-- GitHub -->
                <a href="https://www.github.com/krbeasley" class="flex items-center font-bold gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" style="height: 28px">
                        <g fill="#181616">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M64 5.103c-33.347 0-60.388 27.035-60.388 60.388 0 26.682 17.303 49.317 41.297 57.303 3.017.56 4.125-1.31 4.125-2.905 0-1.44-.056-6.197-.082-11.243-16.8 3.653-20.345-7.125-20.345-7.125-2.747-6.98-6.705-8.836-6.705-8.836-5.48-3.748.413-3.67.413-3.67 6.063.425 9.257 6.223 9.257 6.223 5.386 9.23 14.127 6.562 17.573 5.02.542-3.903 2.107-6.568 3.834-8.076-13.413-1.525-27.514-6.704-27.514-29.843 0-6.593 2.36-11.98 6.223-16.21-.628-1.52-2.695-7.662.584-15.98 0 0 5.07-1.623 16.61 6.19C53.7 35 58.867 34.327 64 34.304c5.13.023 10.3.694 15.127 2.033 11.526-7.813 16.59-6.19 16.59-6.19 3.287 8.317 1.22 14.46.593 15.98 3.872 4.23 6.215 9.617 6.215 16.21 0 23.194-14.127 28.3-27.574 29.796 2.167 1.874 4.097 5.55 4.097 11.183 0 8.08-.07 14.583-.07 16.572 0 1.607 1.088 3.49 4.148 2.897 23.98-7.994 41.263-30.622 41.263-57.294C124.388 32.14 97.35 5.104 64 5.104z"/>
                            <path d="M26.484 91.806c-.133.3-.605.39-1.035.185-.44-.196-.685-.605-.543-.906.13-.31.603-.395 1.04-.188.44.197.69.61.537.91zm2.446 2.729c-.287.267-.85.143-1.232-.28-.396-.42-.47-.983-.177-1.254.298-.266.844-.14 1.24.28.394.426.472.984.17 1.255zM31.312 98.012c-.37.258-.976.017-1.35-.52-.37-.538-.37-1.183.01-1.44.373-.258.97-.025 1.35.507.368.545.368 1.19-.01 1.452zm3.261 3.361c-.33.365-1.036.267-1.552-.23-.527-.487-.674-1.18-.343-1.544.336-.366 1.045-.264 1.564.23.527.486.686 1.18.333 1.543zm4.5 1.951c-.147.473-.825.688-1.51.486-.683-.207-1.13-.76-.99-1.238.14-.477.823-.7 1.512-.485.683.206 1.13.756.988 1.237zm4.943.361c.017.498-.563.91-1.28.92-.723.017-1.308-.387-1.315-.877 0-.503.568-.91 1.29-.924.717-.013 1.306.387 1.306.88zm4.598-.782c.086.485-.413.984-1.126 1.117-.7.13-1.35-.172-1.44-.653-.086-.498.422-.997 1.122-1.126.714-.123 1.354.17 1.444.663zm0 0"/>
                        </g>
                    </svg>
                    View My GitHub
                </a>
            </div>
        </div>

        <!-- Headshot -->
        <div class="flex items-center justify-center md:justify-end">
            <div class="h-65 w-65 md:w-90 md:h-90 rounded-[50%] max-w-[80vw]" id="pfp-container">
                <img src="./src/images/me_pfp.jpg" class="w-full h-full rounded-[50%]" alt="Kyle Beasley Headshot"/>
            </div>
        </div>
    </div>
</section>

<section class="bg-neutral-800 w-full">
    <div class="w-5/6 md:w-11/12 max-w-[1200px] mx-auto">
        <div class="w-full md:w-[360px] border-r-2 border-neutral-500 py-10">
            <p class="text-neutral-50 text-3xl after:absolute after:bottom-2 after:w-full">Recent Blog Posts</p>

            <div class="w-5/6 flex flex-col divide-y">

                <div class="w-full flex flex-col">
                    <p class="text-xl font-bold text-neutral-50">Title Of Post</p>
                    <p class="text-neutral-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, odit!</p>
                </div>

            </div>
        </div>
    </div>
</section>

</body>
</html>
