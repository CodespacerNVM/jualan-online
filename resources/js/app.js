import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import collapse from "@alpinejs/collapse";
import slug from "alpinejs-slug";
window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(collapse);
Alpine.plugin(slug);

Alpine.start();
