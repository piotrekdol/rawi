(function ($) {
'use strict';
$(document).ready(
function () {
mobileHeader.init();
}
);
var mobileHeader = {
init: function () {
var $holder = $('#mainheader');

if ($holder.length) {
mobileHeader.initMobileHeaderOpener($holder);
mobileHeader.initDropDownMobileMenu();
}
},
initMobileHeaderOpener: function (holder) {
var $opener = holder.find('.mobile-header-opener');
if ($opener.length) {
var $navigation = holder.find('.mobile-header-nav');
$opener.on(
'tap click',
function (e) {
e.preventDefault();
if ($navigation.is(':visible')) {
$navigation.slideUp(450);
$opener.removeClass('qodef--opened').attr('aria-expanded', 'false');
} else {
$navigation.slideDown(450);
$opener.addClass('qodef--opened').attr('aria-expanded', 'true');
}
}
);
document.addEventListener(
'keyup',
function (event) {
if (event.key === 'Escape') {
if ($navigation.is(':visible')) {
$navigation.slideUp(450);
$opener.removeClass('qodef--opened').attr('aria-expanded', 'false');
}
} else if (event.key === 'Tab') {
if (typeof event !== 'undefined' && $navigation.is(':visible') && !$navigation.is(event.target) && $navigation.has(event.target).length === 0) {
$navigation.slideUp(450);
$opener.removeClass('qodef--opened').attr('aria-expanded', 'false');
}
}
}
);
}
},
initDropDownMobileMenu: function () {
var $dropdownOpener = $('.mobile-header-nav .menu-item-has-children > .mobile-menu-item-icon');
if ($dropdownOpener.length) {
$dropdownOpener.each(
function () {
var $thisItem = $(this);
$thisItem.on(
'tap click',
function (e) {
e.preventDefault();
var $thisItemParent = $thisItem.parent(),
$thisItemParentSiblingsWithDrop = $thisItemParent.siblings('.menu-item-has-children');
if ($thisItemParent.hasClass('menu-item-has-children')) {
var $submenu = $thisItemParent.find('ul.sub-menu').first();
if ($submenu.is(':visible')) {
$submenu.slideUp(450);
$thisItemParent.removeClass('qodef--opened');
$thisItem.attr('aria-expanded', 'false');
} else {
$thisItemParent.addClass('qodef--opened');
$thisItem.attr('aria-expanded', 'true');
if ($thisItemParentSiblingsWithDrop.length === 0) {
$thisItemParent.find('.sub-menu').slideUp(
400,
function () {
$submenu.slideDown(400);
}
);
} else {
$thisItemParent.siblings().removeClass('qodef--opened').find('.sub-menu').slideUp(
400,
function () {
$submenu.slideDown(400);
}
);
}
}
}
}
);
}
);
}
}
};
})(jQuery);