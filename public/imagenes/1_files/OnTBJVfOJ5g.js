;/*FB_PKG_DELIM*/

__d("BaseMultiPageEntryPointImpl.react",["CometPlaceholder.react","CometRelay","clearTimeout","react","setTimeout"],(function(a,b,c,d,e,f,g){"use strict";var h,i=h||(h=d("react"));b=h;var j=b.useEffect,k=b.useRef,l=b.c;function a(a){var b=l(15),e=a.entryPoint,f=a.environmentProvider,g=a.fallback,h=a.loadedEntryPoint,m=a.otherProps,n=a.placeholderComponent,o=a.preloadParams;a=a.usePlaceholder;n=n===void 0?c("CometPlaceholder.react"):n;a=a===void 0?!0:a;f=d("CometRelay").useEntryPointLoader(f,e);var p=f[0],q=f[1],r=f[2],s=(e=p)!=null?e:h,t=k(null);b[0]!==s.isDisposed||b[1]!==q||b[2]!==o||b[3]!==p||b[4]!==r||b[5]!==h?(f=function(){t.current!=null&&(c("clearTimeout")(t.current),t.current=null);s.isDisposed&&q(o);return function(){t.current=c("setTimeout")(function(){p?r():h.dispose(),t.current=null},6e4)}},e=[r,s.isDisposed,h,o,q,p],b[0]=s.isDisposed,b[1]=q,b[2]=o,b[3]=p,b[4]=r,b[5]=h,b[6]=f,b[7]=e):(f=b[6],e=b[7]);j(f,e);b[8]!==s||b[9]!==m?(f=i.jsx(d("CometRelay").EntryPointContainer,{entryPointReference:s,props:m}),b[8]=s,b[9]=m,b[10]=f):f=b[10];e=f;if(!a)return e;b[11]!==n||b[12]!==g||b[13]!==e?(m=i.jsx(n,{fallback:g,children:e}),b[11]=n,b[12]=g,b[13]=e,b[14]=m):m=b[14];return m}g["default"]=a}),98);
__d("CometGroupResharesDialogPushPageContentQuery_facebookRelayOperation",[],(function(a,b,c,d,e,f){e.exports="8588020117981657"}),null);
__d("ProfilePlusSwitchProfilesUnifiedShareSheetShareToPageQuery_facebookRelayOperation",[],(function(a,b,c,d,e,f){e.exports="6752145014808333"}),null);
__d("usePageEntryPointPrerenderer",["FBLogger","react","useCometEntryPointPrerendererWithQueryTimeoutPrivate"],(function(a,b,c,d,e,f,g){"use strict";var h;b=h||d("react");b.useCallback;var i=b.useState,j=b.c;function a(a,b,d){var e=j(6),f=i(),g=f[0],h=f[1];f=c("useCometEntryPointPrerendererWithQueryTimeoutPrivate")(a,b,d);var k=f[0];a=f[1];e[0]!==k?(b=function(a){var b=k();h(b);if(b==null){c("FBLogger")("comet_ui").blameToPreviousFrame().mustfix("Unable to present comet page EntryPoint component, preloadParams not set");return}b!=null&&a(b)},e[0]=k,e[1]=b):b=e[1];d=b;e[2]!==d||e[3]!==a||e[4]!==g?(f=[d,a,g],e[2]=d,e[3]=a,e[4]=g,e[5]=f):f=e[5];return f}g["default"]=a}),98);
__d("usePushPage",["BaseMultiPageEntryPointImpl.react","BaseMultiPageViewContext","FBLogger","react","useCometRelayEntrypointContextualEnvironmentProvider","usePageEntryPointPrerenderer"],(function(a,b,c,d,e,f,g){"use strict";var h,i=h||(h=d("react"));b=h;b.useCallback;var j=b.useContext,k=b.c;function a(a,b,d){var e=k(9);d=d===void 0?"button":d;var f=c("useCometRelayEntrypointContextualEnvironmentProvider")(),g=j(c("BaseMultiPageViewContext"));d=c("usePageEntryPointPrerenderer")(a,b,d);var h=d[0];d=d[1];var l;e[0]!==g||e[1]!==b||e[2]!==h||e[3]!==a||e[4]!==f?(l=function(e,d){d=d===void 0?{}:d;var j=d.fallback,k=d.pageKey;if(g==null)throw c("FBLogger")("BaseMultiPageView").blameToPreviousFrame().mustfixThrow("usePushPage can only be used inside BaseMultiPageView.");if(b==null)return;h(function(d){return g.pushPage(function(){var h;return i.jsx(c("BaseMultiPageEntryPointImpl.react"),{entryPoint:a,environmentProvider:f,fallback:(h=j)!=null?h:g.fallback,loadedEntryPoint:d,otherProps:e,placeholderComponent:g.placeholderComponent,preloadParams:b})},{pageKey:k})})},e[0]=g,e[1]=b,e[2]=h,e[3]=a,e[4]=f,e[5]=l):l=e[5];l=l;var m;e[6]!==l||e[7]!==d?(m=[l,d],e[6]=l,e[7]=d,e[8]=m):m=e[8];return m}g["default"]=a}),98);