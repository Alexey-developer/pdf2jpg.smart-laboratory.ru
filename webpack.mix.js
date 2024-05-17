const mix = require("laravel-mix");

mix.js("resources/assets/js/common/main.js", "public/assets/js/common");

mix.sass("resources/assets/scss/common/main.scss", "public/assets/css/common");
mix.sass(
    "resources/assets/scss/common/variables.scss",
    "public/assets/css/common"
);
mix.sass(
    "resources/assets/scss/common/templates.scss",
    "public/assets/css/common"
);

if (mix.inProduction()) {
    mix.version();
}
