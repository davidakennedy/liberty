/* Generic WP styling */
amp-img.alignright { float: right; margin: 0 0 1em 1em; }
amp-img.alignleft { float: left; margin: 0 1em 1em 0; }
amp-img.aligncenter { display: block; margin-left: auto; margin-right: auto; }
.alignright { float: right; }
.alignleft { float: left; }
.aligncenter { display: block; margin-left: auto; margin-right: auto; }

.wp-caption.alignleft { margin-right: 1em; }
.wp-caption.alignright { margin-left: 1em; }

.amp-wp-enforced-sizes {
	/** Our sizes fallback is 100vw, and we have a padding on the container; the max-width here prevents the element from overflowing. **/
	max-width: 100%;
}

.amp-wp-unknown-size img {
	/** Worst case scenario when we can't figure out dimensions for an image. **/
	/** Force the image into a box of fixed dimensions and use object-fit to scale. **/
	object-fit: contain;
}

/* Template Styles */
.amp-wp-content, .amp-wp-title-bar div {
	max-width: 739px;
	margin: 0 auto;
}

body {
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 1em;
	line-height: 1.8;
	background: #ffffff;
	color: #222222;
	padding-bottom: 6.25em;
}

.amp-wp-content {
	padding: 1em;
	overflow-wrap: break-word;
	word-wrap: break-word;
	font-weight: 400;
	color: #222222;
}

.amp-wp-title {
	margin: 2.25em 0 0 0;
	font-size: 2.25em;
	line-height: 1.258;
	font-weight: 700;
	color: #222222;
}

.amp-wp-meta {
	margin-bottom: 1em;
}

p,
ol,
ul,
figure {
	margin: 0 0 1.5em 0;
}

a {
	border-bottom: 1px solid #0a6ccc;
	color: #222222;
	text-decoration: none;
	transition: 0.2s;
}

a:visited {
	border-bottom: 1px solid #aa0375;
	color: #222222;
}

a:hover,
a:focus,
a:active {
	color: #222222;
}

a:hover,
a:focus,
a:active {
	border-width: 3px;
}


/* UI Fonts */
.amp-wp-meta,
nav.amp-wp-title-bar,
.wp-caption-text {
	font-size: 0.9375em;
}


/* Meta */
ul.amp-wp-meta {
	padding: 1.5em 0 0 0;
	margin: 0 0 1.5em 0;
}

ul.amp-wp-meta li {
	list-style: none;
	display: inline-block;
	margin: 0;
	line-height: 1.5;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
	max-width: 300px;
}

ul.amp-wp-meta li:before {
	content: "\2022";
	margin: 0 8px;
}

ul.amp-wp-meta li:first-child:before {
	display: none;
}

.amp-wp-meta,
.amp-wp-meta a {
	color: #222222;
}

.amp-wp-meta .screen-reader-text {
	clip: rect(1px, 1px, 1px, 1px);
	height: 1px;
	overflow: hidden;
	position: absolute;
	width: 1px;
}

.amp-wp-byline amp-img {
	border-radius: 50%;
	border: 0;
	background: #f3f6f8;
	position: relative;
	top: 6px;
	margin-right: 6px;
}


/* Titlebar */
nav.amp-wp-title-bar {
	background: #ffffff;
	border-bottom: 1px solid #0a6ccc;
	padding: 0 1em;
}

nav.amp-wp-title-bar div {
	line-height: 3.375em;
	color: #222222;
}

nav.amp-wp-title-bar a {
	border: none;
	color: #222222;
	font-weight: bold;
	text-decoration: none;
}

nav.amp-wp-title-bar .amp-wp-site-icon {
	/** site icon is 32px **/
	float: left;
	margin: 0.6875em 0.5em 0 0;
	border-radius: 50%;
}


/* Captions */
.wp-caption-text {
	padding: 0.5em 1em;
	font-style: italic;
}


/* Quotes */
blockquote {
	padding: 1em;
	margin: 0.5em 0 1.5em 0;
	border-left: 2px solid #0a6ccc;
}

blockquote p:last-child {
	margin-bottom: 0;
}

/* Other Elements */
amp-carousel {
	background: #222222;
}

amp-iframe,
amp-youtube,
amp-instagram,
amp-vine {
	background: #ffffff;
}

amp-carousel > amp-img > img {
	object-fit: contain;
}

.amp-wp-iframe-placeholder {
	background: #cccccc;
}
