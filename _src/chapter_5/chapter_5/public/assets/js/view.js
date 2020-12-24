// We need to initialize the MyMicroblog for our templates
// to work
MyMicroblog = {};

// Inspired from FuelPHP's render method
function render(view, data) {
    return Mustache.render(
        MyMicroblog.templates[view],
        data,
        MyMicroblog.templates
    );
}
