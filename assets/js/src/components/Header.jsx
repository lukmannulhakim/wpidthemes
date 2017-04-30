'use strict';

import NavMenu from './NavMenu.jsx';

class Header extends React.Component {
	render() {
		return (
			<div>
				<header id="masthead" className="site-header" role="banner">
					<div className="site-header-main">
						<div className="site-branding">
							<div
								dangerouslySetInnerHTML={{__html: this.props.template_tags.wpid_the_custom_logo}}>
							</div>
							{'home' === this.props.route.type ?
								<h1 className="site-title"><a
									href={this.props.template_tags.home_url}
									rel="home">{this.props.template_tags.bloginfo_name}</a>
								</h1>
								:
								<div>
									<p className="site-title"><a
										href={this.props.template_tags.home_url}
										rel="home">{this.props.template_tags.bloginfo_name}</a>
									</p>

									<p className="site-description">{this.props.template_tags.bloginfo_description}</p>
								</div>
							}
						</div>
						{this.props.nav_menus.primary ||
						this.props.nav_menus.social ?
							<div>
								<button id="menu-toggle"
										className="menu-toggle">Menu
								</button>

								<div id="site-header-menu"
									 className="site-header-menu">
									{this.props.nav_menus.primary ?
										<nav id="site-navigation"
											 className="main-navigation"
											 role="navigation"
											 aria-label="Primary Menu">
											<NavMenu {...this.props}
													 className="primary-menu"
													 location="primary"/>
										</nav>
										: '' }

									{this.props.nav_menus.social ?
										<nav id="social-navigation"
											 className="social-navigation"
											 role="navigation"
											 aria-label="Social Links Menu">
											<NavMenu {...this.props}
													 className="social-links-menu"
													 location="social"/>
										</nav>
										: '' }
								</div>
							</div>
							: '' }
					</div>
				</header>
			</div>
		);
	}
}

export default Header;
