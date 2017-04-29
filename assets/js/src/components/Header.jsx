'use strict';

class Header extends React.Component {
	render() {
		return (
			<div>
				<header id="masthead" className="site-header" role="banner">
					<div className="site-header-main">
						<div dangerouslySetInnerHTML={{__html: this.props.template_tags.twentysixteen_the_custom_logo}}></div>
					</div>
				</header>
			</div>
		);
	}
}

export default Header;
