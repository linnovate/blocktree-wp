
// Widgets list
window.widgets = {};
widgets["my_widget_name"] = (props)=>`Hello ${props.value}!!!`;

// Main function
window.ElementreeWidgets = function(name, el, settings) {
  try {
    if (widgets[name]) {
      // render the widget
      // ...
      el.innerHTML = widgets[name](settings); // example
    } else {
      el.innerHTML = 'Block ' + "<strong>" + name + "</strong>" + ' is empty client component';
    }
  } catch (error) {
    el.innerHTML = 'Client component is broken.' + "<br/>" + error;
  }
}
