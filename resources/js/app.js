import './bootstrap';
import "flowbite";
import "flowbite-datepicker"
import moment from "moment";
import Datepicker from 'flowbite-datepicker/Datepicker';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Datepicker = Datepicker
window.moment = moment

Alpine.start();
