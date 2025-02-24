<?php

/*
 * Branding configs for your application
 */

return [
    'logo' => [
        'type' => 'image',
        'image_src' => '/assets/img/logo.png',
        'svg_string' => '<svg class="w-full h-full fill-current text-zinc-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 26" fill="none"><g fill="currentColor"><path d="M21.44 13.101c1.096 1.049 2.456.121 2.425-1.647a3.281 3.281 0 0 0-.632-1.877c-.381-.498-.866-.769-1.33-.742-1.568.088-1.875 2.92-.463 4.266ZM25.394 15.28c.18-.926 0-1.535-.06-1.736-.177-.52-.458-.646-.573-.677-1.098-.296-2.012 2.68-1.208 3.93.544.845 1.541.022 1.841-1.517ZM22.908 5.964c-.898.21-.015 3.049 1.152 3.707.747.42 1.1-.36.713-1.574a4.657 4.657 0 0 0-.832-1.524c-.38-.443-.767-.672-1.033-.61ZM18.106 8.951c1.307.922 2.77.171 2.557-1.317-.1-.599-.4-1.146-.854-1.551-.204-.173-.825-.701-1.591-.589-1.392.204-1.695 2.34-.112 3.457ZM20.646 13.375c-.16-.198-.496-.609-1.121-.708-1.756-.277-3.05 2.048-2.005 3.606 1.01 1.506 3.14.857 3.507-1.073a2.364 2.364 0 0 0-.381-1.825ZM26.39 11.739a6.3 6.3 0 0 0-.326-1.6c-.064-.16-.257-.652-.477-.625-.561.069-.254 3.43.357 3.907.334.26.541-.525.447-1.682ZM20.653 3.576c-.727-.529-1.109-.518-1.3-.416-.72.38.278 2.447 1.632 2.866.826.255 1.171-.347.711-1.239a3.806 3.806 0 0 0-1.043-1.211ZM22.666 18.762c.341-.8.18-1.31.12-1.501a.926.926 0 0 0-.433-.49c-1.146-.554-2.794 1.534-2.316 2.938.425 1.255 2.02.483 2.63-.947ZM17.048 9.424a2.18 2.18 0 0 0-1.457-.646c-1.87-.066-2.829 2.127-1.527 3.503 1.25 1.326 3.48.593 3.614-1.19.064-.898-.463-1.477-.63-1.667ZM24.445 6.423c.219.056-.007-.487-.483-1.16a8.943 8.943 0 0 0-.894-1.075c-.313-.316-.555-.496-.616-.458-.234.145 1.574 2.586 1.993 2.693ZM25.553 16.917c-.407-.169-1.694 2.433-1.514 3.06.1.343.695-.326 1.158-1.302.202-.405.348-.835.432-1.28.055-.366-.024-.456-.076-.478ZM14.379 5.122c1.05.8 2.521.285 2.379-.83-.07-.558-.509-.927-.652-1.048-.35-.285-.8-.422-1.25-.38-1.078.125-1.533 1.451-.477 2.258ZM16.942 18.76a1.528 1.528 0 0 0-.316-1.407 1.636 1.636 0 0 0-.89-.518c-1.6-.358-2.92 1.29-2.076 2.591.823 1.269 2.877.851 3.282-.666ZM21.407 3.384c.23 0 .095-.343-.477-.848a6.935 6.935 0 0 0-1.072-.763c-.407-.236-.72-.359-.777-.307-.136.127 1.732 1.923 2.326 1.918ZM23.02 20.302c-.5-.408-2.265 1.518-2.147 2.341.068.477 1.05-.158 1.684-.961.443-.557.514-.907.542-1.04.011-.073.026-.253-.08-.34ZM17.17 1.38c-.713-.38-1.003-.285-1.112-.19-.45.381.367 1.551 1.4 1.727.64.108.898-.278.542-.81-.256-.382-.69-.64-.83-.726ZM18.907 21.827c.326-.578.173-.932.107-1.084a.86.86 0 0 0-.222-.255c-.911-.66-2.641.643-2.373 1.788.264 1.13 1.858.672 2.488-.45ZM11.761 12.828c-1.602-.229-2.628 1.659-1.615 2.968a1.778 1.778 0 0 0 3.204-.843c.115-.808-.322-1.334-.487-1.535a1.91 1.91 0 0 0-1.101-.59ZM10.643 8.147c.897 1.034 2.76.451 2.93-.917a1.527 1.527 0 0 0-.434-1.248 1.585 1.585 0 0 0-.932-.449c-1.433-.165-2.47 1.569-1.565 2.614ZM17.502 24.629c-.041.452.988.02 1.623-.586.35-.332.393-.53.414-.626a.252.252 0 0 0-.03-.156c-.309-.46-1.943.648-2.007 1.368ZM17.085.861c.41.19.669.25.75.217.115-.047-.09-.24-.467-.437a5.857 5.857 0 0 0-.917-.374c-.087-.028-.527-.164-.593-.128.02.063.857.546 1.227.722ZM6.92 11.684c.67.945 2.292.551 2.522-.924a1.628 1.628 0 0 0-.301-1.263 1.27 1.27 0 0 0-.815-.458c-1.28-.162-2.186 1.543-1.405 2.645ZM11.755 20.47c-1.08-.136-1.652.897-.955 1.726.697.83 2.01.582 2.124-.405.06-.506-.248-.829-.363-.953a1.48 1.48 0 0 0-.806-.368ZM11.826 2.226c.398.469 1.543.264 1.635-.443a.665.665 0 0 0-.224-.572.805.805 0 0 0-.441-.19c-.737-.078-1.38.722-.97 1.205ZM15.243 24.198a.58.58 0 0 0-.047-.654.686.686 0 0 0-.277-.19c-.764-.298-1.675.362-1.416 1.021.259.66 1.382.548 1.74-.177ZM14.453.764c.35.041.606-.113.409-.381a1.097 1.097 0 0 0-.418-.293c-.397-.155-.562-.085-.626-.03-.209.187.065.635.635.704ZM8.414 4.58c.258.698 1.623.476 2.005-.533.114-.299.096-.59-.044-.802a.584.584 0 0 0-.234-.198c-.782-.369-2.022.734-1.727 1.532ZM9.364 18.503a1.618 1.618 0 0 0-.468-1.108c-.124-.115-.5-.466-1.05-.437-1.027.051-1.28 1.402-.415 2.224.819.773 1.937.379 1.933-.679ZM14.796 25.899c-.032.236.62.013.941-.19.26-.167.28-.278.287-.325a.156.156 0 0 0-.014-.056c-.153-.272-1.165.204-1.214.571ZM5.643 14.597a1.757 1.757 0 0 0-.302-1.072c-.096-.118-.316-.393-.676-.414-.886-.05-1.232 1.476-.513 2.268.6.667 1.451.217 1.491-.782ZM4.852 7.708c.264.628 1.322.331 1.695-.673.177-.477.065-.762.023-.872a.532.532 0 0 0-.261-.258c-.733-.31-1.792 1.005-1.457 1.803ZM11.988.274a.358.358 0 0 0 .133-.2.056.056 0 0 0-.016-.039c-.118-.107-.941.202-.95.434-.007.187.514.098.833-.195ZM10.407 24.062a1.169 1.169 0 0 0-.405-.504c-.309-.222-.597-.25-.75-.207-.442.125-.161.77.47 1.076.542.265.818.017.685-.365ZM12.653 25.426a.707.707 0 0 0-.458-.117c-.286.033-.328.252-.095.452.286.246.763.255.738-.055a.42.42 0 0 0-.185-.28ZM9.156 1.683c.181-.2.203-.311.213-.359a.103.103 0 0 0-.032-.095c-.242-.199-1.35.54-1.316.878.028.267.697.06 1.135-.424ZM6.877 21.384a1.686 1.686 0 0 0-.437-.608c-.44-.36-.705-.293-.799-.247-.451.223.058 1.233.757 1.502.462.177.689-.131.478-.647ZM2.982 10.527c.066-.258.06-.529-.019-.783-.082-.218-.212-.27-.286-.286-.536-.095-1.02 1.224-.654 1.783.255.39.784.1.96-.714ZM5.497 4.03a1.12 1.12 0 0 0 .246-.484c0-.04.008-.11-.037-.143-.254-.19-1.218.762-1.146 1.13.052.259.567-.02.937-.503ZM3.006 17.376c-.169-.213-.35-.317-.486-.28-.409.114-.149 1.189.376 1.555.37.258.54-.11.437-.587a1.764 1.764 0 0 0-.327-.688ZM2.192 6.964c.062-.122.108-.253.134-.388.006-.043.017-.136-.03-.15-.173-.053-.669.822-.598 1.048.05.157.32-.156.494-.514v.004ZM.722 13.682c-.023-.061-.084-.224-.164-.214-.22.03-.176 1.09.054 1.275.135.109.217-.222.198-.58a1.784 1.784 0 0 0-.088-.481Z"/></g></svg>',
        'height' => '32',
    ],
    'background' => [
        'color' => '#ffffff',
        'image' => '/assets/img/background.jpg',
        'image_overlay_color' => '#000000',
        'image_overlay_opacity' => '0.5',
    ],
    'color' => [
        'text' => '#9437ff',
        'button' => '#7980ff',
        'button_text' => '#ffffff',
        'input_text' => '',
        'input_border' => '#212936',
    ],
    'alignment' => [
        'heading' => 'left',
        'container' => 'left',
    ],
    'favicon' => [
        'light' => '/auth/img/favicon.png',
        'dark' => '/auth/img/favicon-dark.png',
    ],
];
