"use strict";
import $ from 'jquery';
window.$ = $;

import Foundation from './lib/foundation';
$(document).foundation();

// helper
import './helper/exit-intent-reveal';
// components
import './components/iconlist';

// import FA last, to kick off the process of finding <i> tags and
// replacing with <svg> tags, after importing all components.
import './lib/FontAwesome';

// other
import './components/custom';
