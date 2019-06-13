
/*
 * CRRender
 *
 */
function CRRender(el, name, settings) {
	// use try/catch for any error
	try {
		if (CRWidgets[name]) {
			// render component
			CRWidgets[name](el, settings);
		} else {
			// show the problem
			el.innerHTML = "Empty client component. <br/>(see: \
					<a targt='_blank' href='https://gitlab.linnovate.net/aron/client_render'>https://gitlab.linnovate.net/aron/client_render</a>, \
					OR use \
					<a targt='_blank' href='https://gitlab.linnovate.net/aron/CR_react_components_tmp'>https://gitlab.linnovate.net/aron/CR_react_components_tmp</a>\
				)";
		}
	} catch (e) {
		// show the error
		el.innerHTML = "Client component is broken. <br/> " + e;
	}
}
