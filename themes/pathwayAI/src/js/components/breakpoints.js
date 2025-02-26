// Get the current breakpoint
// import getBreakpoint from './breakpoints.js';
// let breakpoint = getBreakpoint(); in your file

function getBreakpoint() {
    return window.getComputedStyle(document.body, ':before').content.replace(/"/g, '');
}

export default getBreakpoint;
