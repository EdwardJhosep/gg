;/*FB_PKG_DELIM*/

__d("CometComposerLinksPluginForLexicalDeferred.react",["createComposerDeferredPlugin","react","requireDeferred"],(function(a,b,c,d,e,f,g){"use strict";var h;h||d("react");a=c("createComposerDeferredPlugin")(c("requireDeferred")("CometComposerLinksPluginForLexical.react").__setRef("CometComposerLinksPluginForLexicalDeferred.react"));g["default"]=a}),98);
__d("CometEventPermalinkTab",["$InternalEnum"],(function(a,b,c,d,e,f){a=b("$InternalEnum")({ABOUT:"about",DISCUSSION:"discussion",BRACKETS:"brackets",BROADCASTS:"broadcasts",PARTICIPANTS:"participants",STANDINGS:"standings",VIDEOS:"videos",PAID_ACCESS:"paid_access"});c=a;f["default"]=c}),66);
__d("EventCometActionContextDefault",[],(function(a,b,c,d,e,f){"use strict";a={event_action_history:[]};f["default"]=a}),66);
__d("EventCometActionContext",["EventCometActionContextDefault","react"],(function(a,b,c,d,e,f,g){"use strict";var h;a=h||d("react");b=a.createContext(c("EventCometActionContextDefault"));g["default"]=b}),98);
__d("EventCometActionLoggerDeferred",["promiseDone","requireDeferred"],(function(a,b,c,d,e,f,g){"use strict";var h=c("requireDeferred")("EventCometActionLogger").__setRef("EventCometActionLoggerDeferred");function a(a,b,d){c("promiseDone")(h.load().then(function(c){return c.log(a,b,d)}))}g.log=a}),98);
__d("EventCometActionLoggerUtils",["CometRouteURL"],(function(a,b,c,d,e,f,g){"use strict";var h={mechanism:"unknown",surface:"unknown"},i=3;function a(a,b){var c=[].concat(a.event_action_history||[]);c.length>=i&&(c=c.slice(c.length-i+1));var d=j(a);c.push({event_tracking:d.event_tracking,extra_data:d.extra_data,mechanism:b.mechanism,surface:b.surface});return babelHelpers["extends"]({},a,{event_action_history:c})}function j(a){a=a.event_action_history;if(a==null||a[a.length-1]==null)return h;return a.length>=2?a[a.length-2]:a[a.length-1]}function b(){var a=d("CometRouteURL").useRouteURL(),b=/\/events\/\d+/;if(b.test(a))return"permalink";if(a.includes("/events/calendar"))return"bookmark_calendar";if(a.includes("/events"))return"bookmark";return a.includes("profile.php")?"timeline":"newsfeed"}g.createForNewSurface=a;g.getLastActionHistoryEntry=j;g.useExtractEventComposerSurface=b}),98);
__d("XCometEventPermalinkControllerRouteBuilder",["jsRouteBuilder"],(function(a,b,c,d,e,f,g){a=c("jsRouteBuilder")("/events/{event_id}/{?child_event_id}/",Object.freeze({active_tab:"about",show_created_event_toast:!1,hide_invite_flow_filter_groups:!1,show_join_in_vr_dialog:!1}),void 0);b=a;g["default"]=b}),98);
__d("castToEnum",[],(function(a,b,c,d,e,f){"use strict";function a(a,b,c){var d=Object.keys(b);for(var e=0;e<d.length;e++)if(b[d[e]]===a)return b[d[e]];return c}f["default"]=a}),66);
__d("cometFormattedTextIneligibilityCheck",[],(function(a,b,c,d,e,f){"use strict";function a(a,b,c){var d;b===void 0&&(b=130);c===void 0&&(c=3);return((d=(d=a.match(/\n/g))==null?void 0:d.length)!=null?d:0)>=c||a.length>b}f["default"]=a}),66);
__d("distinctArray",[],(function(a,b,c,d,e,f){function a(a){if(a==null)return[];if(Array.isArray(a)){var b=a.length;if(b<=200){var c=[];for(var d=0;d<b;d++){var e=a[d];c.indexOf(e)===-1&&c.push(e)}return c}}return Array.from(new Set(a).values())}f["default"]=a}),66);
__d("mapMapToArray",[],(function(a,b,c,d,e,f){"use strict";function a(a,b){var c=[],d=0;for(var e=a,f=Array.isArray(e),g=0,e=f?e:e[typeof Symbol==="function"?Symbol.iterator:"@@iterator"]();;){var h;if(f){if(g>=e.length)break;h=e[g++]}else{g=e.next();if(g.done)break;h=g.value}h=h;var i=h[0];h=h[1];c.push(b(h,i,d,a));d++}return c}f["default"]=a}),66);
__d("useBaseDynamicEntryPointDialog",["CometDialogContext","CometRelay","CometSuspendedDialogImpl.react","clearTimeout","react","setTimeout","tracePolicyFromResource","useCometRelayEntrypointContextualEnvironmentProvider"],(function(a,b,c,d,e,f,g){"use strict";var h,i=h||(h=d("react"));b=h;b.useCallback;var j=b.useContext,k=b.useEffect,l=b.useRef,m=b.c;function n(a){var b=m(14),e=a.entryPoint,f=a.environmentProvider,g=a.onClose,h=a.otherProps,j=a.preloadedEntryPoint,n=a.preloadParams;a=d("CometRelay").useEntryPointLoader(f,e);var o=a[0],p=a[1],q=a[2],r=(f=o)!=null?f:j,s=l(null);b[0]!==r.isDisposed||b[1]!==p||b[2]!==n||b[3]!==o||b[4]!==q||b[5]!==j?(e=function(){s.current!=null&&(c("clearTimeout")(s.current),s.current=null);r.isDisposed&&p(n);return function(){s.current=c("setTimeout")(function(){o?q():j.dispose(),s.current=null},6e4)}},a=[q,r.isDisposed,j,n,p,o],b[0]=r.isDisposed,b[1]=p,b[2]=n,b[3]=o,b[4]=q,b[5]=j,b[6]=e,b[7]=a):(e=b[6],a=b[7]);k(e,a);b[8]!==h||b[9]!==g?(f=babelHelpers["extends"]({},h,{onClose:g}),b[8]=h,b[9]=g,b[10]=f):f=b[10];e=f;b[11]!==j||b[12]!==e?(a=i.jsx(d("CometRelay").EntryPointContainer,{entryPointReference:j,props:e}),b[11]=j,b[12]=e,b[13]=a):a=b[13];return a}function a(a,b,e,f){var g=m(6),h=c("useCometRelayEntrypointContextualEnvironmentProvider")(f),i=j(c("CometDialogContext"));g[0]!==h||g[1]!==a||g[2]!==i||g[3]!==e||g[4]!==b?(f=function(f,g,j,k){var l=d("CometRelay").loadEntryPoint(h,a,f),m=function(){for(var a=arguments.length,b=new Array(a),c=0;c<a;c++)b[c]=arguments[c];var d=b;j&&j.apply(void 0,d);var e=l==null?void 0:l.dispose;e&&e()};i(c("CometSuspendedDialogImpl.react"),{dialog:n,dialogProps:{entryPoint:a,environmentProvider:h,otherProps:g,preloadedEntryPoint:l,preloadParams:f},fallback:e},{loadType:"entrypoint",preloadTrigger:b,tracePolicy:(g=k)!=null?g:c("tracePolicyFromResource")("comet.dialog",a.root)},m)},g[0]=h,g[1]=a,g[2]=i,g[3]=e,g[4]=b,g[5]=f):f=g[5];return f}g["default"]=a}),98);
__d("useCometDynamicEntryPointDialog",["FDSDialogLoadingState.react","react","useBaseDynamicEntryPointDialog"],(function(a,b,c,d,e,f,g){"use strict";var h,i=h||d("react"),j=function(a){return i.jsx(c("FDSDialogLoadingState.react"),{onClose:a})};function a(a,b,d,e){return c("useBaseDynamicEntryPointDialog")(a,b,(a=d)!=null?a:j,e)}g["default"]=a}),98);
__d("useEventCometActionContext",["EventCometActionContext","EventCometActionContextDefault","react","recoverableViolation"],(function(a,b,c,d,e,f,g){"use strict";var h,i=(h||d("react")).useContext;function a(){var a=i(c("EventCometActionContext"));a===c("EventCometActionContextDefault")&&c("recoverableViolation")("EventCometActionContext used without provider","events");return a}g["default"]=a}),98);
__d("useShallowEqualMemo",["shallowEqual","useCustomEqualityMemo"],(function(a,b,c,d,e,f,g){"use strict";function a(a){return c("useCustomEqualityMemo")(a,c("shallowEqual"))}g["default"]=a}),98);