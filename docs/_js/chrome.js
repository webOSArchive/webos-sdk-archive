var G = {
	nav: null,
	currentNode: null,
	doc: null,
	iframe: false
}

$( document ).ready( function() {
	// Bind the navigation up front. This used to happen inside the callback
	// below, so a single failed request left the whole page dead: no nav
	// clicks, no hashchange handler and no initial document.
	G.nav = $( "#nav" );
	$( G.nav ).find( "a" ).click( handleNavClick );
	$( window ).hashchange( loadDocFromHash );

	// Probe one document to find out whether we can read pages with AJAX.
	// Opened from a file:// URL we cannot, and have to fall back to an iframe.
	var testDoc = $( "#toc" ).find( "a" ).first().attr( "href" );
	$.ajax( {
		url: testDoc,
		dataType: "text",
		success: function( data ) {
			if ( !data ) {
				useIframe();
			} else {
				$( document ).click( handleDocClick );
			}
			loadDocFromHash();
		},
		error: function() {
			// The probe failed. Fall back to iframes and still show something
			// rather than leaving the reader with an empty page.
			useIframe();
			loadDocFromHash();
		}
	} );
} );

function useIframe() {
	G.iframe = true;
	$( "#doc" ).replaceWith( '<iframe name="doc" id="doc"></iframe>' );
}

function loadDocFromHash() {
	var doc, tocNode;
	if ( location.hash ) {
		doc = unescape( location.hash.substr( 1 ) );
		tocNode = tocNodeFor( doc );
	} else {
		var firstTocLink = $( "#toc" ).find( "a" ).first();
		tocNode = firstTocLink.parent();
		doc = firstTocLink.attr( "href" );
	}
	G.doc = doc;
	if ( tocNode && tocNode.length ) {
		setCurrent( tocNode );
	}
	if ( G.iframe )
	{
		if( frames[ "doc" ].location !== doc ) {
			frames[ "doc" ].location = doc;
		}
	} else {
		loadDoc( doc );
	}
}

// Find the table-of-contents entry for a document. Matching is done by
// comparing attributes rather than with an attribute selector, because hrefs
// contain "#" and "." which have to be escaped inside a selector. A link to
// an anchor inside a page falls back to the entry for the page itself, so
// deep links still highlight the section they belong to.
function tocNodeFor( doc ) {
	var link = navLinkWithHref( doc );
	if ( !link.length ) {
		link = navLinkWithHref( doc.split( "#" )[ 0 ] );
	}
	return link.parent();
}

function navLinkWithHref( href ) {
	return $( G.nav ? G.nav : "#nav" ).find( "a" ).filter( function() {
		return $( this ).attr( "href" ) === href;
	} ).first();
}

function loadDoc( doc ) {
	$.ajax( {
		url: doc,
		dataType: "text",
		success: function( data ) {
			var match = data ? data.match( /<body[^>]*>[\s\n]*(<div id="content">[\s\S]*<\/div>)[\s\n]*<\/body>/ ) : null;
			if ( !match ) {
				// An unexpected page shape used to throw here, which left the
				// previous document on screen as though nothing was clicked.
				showDocMessage( "Sorry, this page could not be displayed." );
				return;
			}
			$( "#doc" ).html( match[ 1 ] );
			scrollToAnchor( doc );
			rewritePaths( doc );
		},
		error: function() {
			showDocMessage( "Sorry, this page could not be loaded." );
		}
	} );
}

function showDocMessage( text ) {
	$( "#doc" ).html( '<div id="content"><p></p></div>' );
	$( "#doc" ).find( "p" ).text( text );
}

// Scroll to the requested anchor. The anchor is often missing from the page,
// and reading .offset() of nothing used to throw, which aborted the rest of
// the load and left images and links in that page unresolved.
function scrollToAnchor( doc ) {
	var pos = 0;
	var hashStart = doc.indexOf( "#" );
	if ( hashStart !== -1 ) {
		var target = findAnchor( doc.substr( hashStart + 1 ) );
		if ( target && target.length && target.offset() ) {
			pos = target.offset().top - 10;
		}
	}
	$( window ).scrollTop( pos );
}

function findAnchor( name ) {
	var doc = $( "#doc" );
	var byId = null;
	try {
		byId = doc.find( "#" + name.replace( /(:|\.)/g, "\\$1" ) );
	} catch ( err ) {
		byId = null;
	}
	if ( byId && byId.length ) {
		return byId;
	}
	// Older pages mark their sections with <a name="..."> rather than an id.
	return doc.find( "a" ).filter( function() {
		return $( this ).attr( "name" ) === name;
	} );
}

function rewritePaths( doc ) {
	var pathPrefix = "";
	var lastSlash = doc.lastIndexOf( "/" );
	if ( lastSlash ) {
		pathPrefix = doc.substr( 0, lastSlash + 1 );
	}

	$( "#doc" ).find( "img" ).each( function() {
		var src = $( this ).attr( "src" );
		if ( src && src.indexOf( "://" ) == -1 ) {
			$( this ).attr( "src", adjustPath( src, pathPrefix ) );
		}
	} );

	$( "#doc" ).find( "a" ).each( function() {
		var href = $( this ).attr( "href" );
		if ( href && href.indexOf( "://" ) == -1 ) {
			$( this ).attr( "href", adjustPath( href, pathPrefix ) );
		}
	} );
}

function adjustPath( path, prefix ) {
    if ( path.indexOf( "#" ) == 0 || path.indexOf( "../" ) == 0 ) {
        return path;
    } else if ( path.indexOf( "/" ) == 0 ) {
        return path.substr( 1 );
    } else {
        return prefix + path;
    }
}

function showNode( n ) {
	$( n ).show().addClass( "hilite" );
	$( n ).parents( "#toc li, #toc ul" ).show().addClass( "hilite" );
	$( n ).siblings().show();
	$( n ).children( "ul" ).show().addClass( "hilite" ).children( "li" ).show().addClass( "hilite" );
	showTopLevelNodes();
}

function hideNode( n ) {
	$( n ).find( "ul, li" ).hide().removeClass( "hilite" );
	$( n ).siblings().hide();
	$( n ).parents( "#toc li, #toc ul" ).hide().removeClass( "hilite" );
	$( n ).hide().removeClass( "hilite" );
	showTopLevelNodes();
}

function showTopLevelNodes() {
	$( "#toc" ).children( "li" ).show();
}

function setCurrent( el ) {
	if ( G.currentNode ) {
		$( G.currentNode ).removeClass( "current" );
		hideNode( G.currentNode );
	}
	$( el ).addClass( "current" );
	showNode( el );
	G.currentNode = el;
}

function handleNavClick() {
	var doc = $( this ).attr( "href" );
	if ( G.iframe ) {
		var tocNode = $( this ).parent();
		setCurrent( tocNode );
		return true;
	} else {
		location.hash = "#" + doc;
		return false;
	}
}

function handleDocClick( e ) {
	var t = e.target;
	// The click often lands on something inside the link, such as <code> or
	// <em>. Walk up to the link itself instead of ignoring the click, which
	// used to let the browser follow the raw href and leave the shell.
	while ( t && t.nodeType === 1 && !t.nodeName.match( /^[aA]$/ ) && t.id !== "doc" ) {
		t = t.parentNode;
	}
	if ( !t || t.nodeType !== 1 || !t.nodeName.match( /^[aA]$/ ) ) {
		return true;
	}

	// Section markers such as <a name="foo"> carry no href at all. Reading
	// one used to throw and swallow the click.
	var href = t.getAttribute( "href" );
	if ( href === null || href === "" ) {
		return true;
	}

	// Leave mailto:, javascript: and the like to the browser.
	var proto = t.protocol;
	if ( proto && proto !== ":" && proto !== "http:" && proto !== "https:" ) {
		return true;
	}

	// A link is only external when its host differs from ours. The old test
	// was simply "if ( t.host )", but an anchor element reports the resolved
	// host for every link, so every in-page link was treated as external and
	// opened in a new tab, which is what lost the navigation.
	if ( t.host && location.host && t.host !== location.host ) {
		t.target = "_blank";
		return true;
	}

	var hash = hashForLink( href );
	if ( hash === null ) {
		// Not a document we can route, such as a download. Open it separately
		// so the surrounding documentation stays put.
		t.target = "_blank";
		return true;
	}
	location.hash = hash;
	return false;
}

// Work out the hash that shows the target of an in-document link.
//
// Links inside a loaded page have already been through adjustPath(), which
// rewrites them relative to the docs root and leaves only "#..." and "../..."
// untouched. A plain path arriving here is therefore ALREADY root-relative
// and must not be resolved against the current document a second time, or it
// picks up the current directory twice and points at a page that is not there.
function hashForLink( href ) {
	var currentPath = ( G.doc || "" ).split( "#" )[ 0 ];

	// A bare anchor stays on the current page.
	if ( href.charAt( 0 ) === "#" ) {
		return "#" + currentPath + href;
	}

	var hashAt = href.indexOf( "#" );
	var path = hashAt === -1 ? href : href.substr( 0, hashAt );
	var anchor = hashAt === -1 ? "" : href.substr( hashAt );

	if ( !/\.html$/i.test( path ) ) {
		return null;
	}

	if ( path.indexOf( "../" ) === 0 ) {
		// adjustPath leaves these alone, so they are still relative to the
		// page that contains them.
		path = resolvePath( currentPath, path );
	} else {
		// Already root-relative: just tidy up "/" and "./" segments.
		path = resolvePath( "", path );
	}
	return "#" + path + anchor;
}

// Resolve a relative link against the document holding it. The previous
// version joined path segments without separators, so anything with more
// than one "../" produced a mangled path such as "dev-guideenyo/x.html".
function resolvePath( fromDoc, rel ) {
	var segments;
	if ( rel.charAt( 0 ) === "/" ) {
		segments = rel.substr( 1 ).split( "/" );
	} else {
		var base = fromDoc.split( "/" );
		base.pop();
		segments = base.concat( rel.split( "/" ) );
	}

	var out = [];
	for ( var i = 0; i < segments.length; i++ ) {
		var s = segments[ i ];
		if ( s === "" || s === "." ) {
			continue;
		}
		if ( s === ".." ) {
			out.pop();
		} else {
			out.push( s );
		}
	}
	return out.join( "/" );
}
