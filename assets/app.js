/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import AOS from 'aos';
import 'aos/dist/aos.css';
AOS.init();

// You can specify wich plugions you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';
// import './styles/style.css';

// import 'bootstrap/dist/js/bootstrap.bundle';
// import './css/style.css';
// import $ from 'jquery';
