;/*FB_PKG_DELIM*/

__d("GeoPrivateMakeComponent",["cr:1641505","emptyFunction","react"],(function(a,b,c,d,e,f,g){"use strict";var h;h||d("react");c("emptyFunction")(b("cr:1641505"));function a(a,b){b.displayName==null&&(b.displayName=a);return b}g.makeGeoComponent=a}),98);
__d("webFlexItem",[],(function(a,b,c,d,e,f,g){"use strict";var h={reset:{minHeight:"x2lwn1j",minWidth:"xeuugli",$$css:!0}},i={center:{alignSelf:"xamitd3",$$css:!0},end:{alignSelf:"xpvyfi4",$$css:!0},start:{alignSelf:"xqcrz7y",$$css:!0},stretch:{alignSelf:"xkh2ocl",$$css:!0},baseline:{alignSelf:"xoi2r2e",$$css:!0}},j={0:{flexBasis:"x1r8uery",$$css:!0},auto:{flexBasis:"xdl72j9",$$css:!0},content:{flexBasis:"xcklp1c",$$css:!0}},k={0:{flexGrow:"x1c4vz4f",$$css:!0},1:{flexGrow:"x1iyjqo2",$$css:!0},2:{flexGrow:"xgyuaek",$$css:!0},3:{flexGrow:"x1ikap7u",$$css:!0},4:{flexGrow:"xrnhffl",$$css:!0}},l={0:{order:"x1g77sc7",$$css:!0},1:{order:"x9ek82g",$$css:!0},2:{order:"x14yy4lh",$$css:!0},3:{order:"xo1ph6p",$$css:!0},4:{order:"x182iqb8",$$css:!0},5:{order:"x1h3rv7z",$$css:!0}},m={0:{flexShrink:"x2lah0s",$$css:!0},1:{flexShrink:"xs83m0k",$$css:!0},2:{flexShrink:"x5wqa0o",$$css:!0},3:{flexShrink:"xo4cfa7",$$css:!0},4:{flexShrink:"x1bcm92b",$$css:!0}};function a(a){var b=a.alignSelf,c=a.basis,d=a.grow,e=a.order,f=a.shrink;a=a.defaultMinSize;a=a===void 0?0:a;return[a===0&&h.reset,b!=null&&i[b],c!=null&&j[c],d!=null&&k[d],e!=null&&l[e],f!=null&&m[f]]}g["default"]=a}),98);
__d("webFlexbox",[],(function(a,b,c,d,e,f,g){"use strict";var h={center:{alignContent:"xc26acl",$$css:!0},end:{alignContent:"xnwe2h8",$$css:!0},"space-around":{alignContent:"x1jpljmv",$$css:!0},"space-between":{alignContent:"xcdzlcm",$$css:!0},start:{alignContent:"x8gbvx8",$$css:!0},stretch:{alignContent:"xqjyukv",$$css:!0}},i={baseline:{alignItems:"x1pha0wt",$$css:!0},center:{alignItems:"x6s0dn4",$$css:!0},end:{alignItems:"xuk3077",$$css:!0},start:{alignItems:"x1cy8zhl",$$css:!0},stretch:{alignItems:"x1qjc9v5",$$css:!0}},j={column:{flexDirection:"xdt5ytf",$$css:!0},"column-reverse":{flexDirection:"x3ieub6",$$css:!0},row:{flexDirection:"x1q0g3np",$$css:!0},"row-reverse":{flexDirection:"x15zctf7",$$css:!0}},k={flex:{display:"x78zum5",$$css:!0},"inline-flex":{display:"x3nfvp2",$$css:!0}},l={0:{columnGap:"x1o1pmfc",$$css:!0},4:{columnGap:"x17zd0t2",$$css:!0},8:{columnGap:"xfex06f",$$css:!0},12:{columnGap:"xtqikln",$$css:!0},16:{columnGap:"x40hh3e",$$css:!0},20:{columnGap:"x18hwk67",$$css:!0},24:{columnGap:"x1qgv0r9",$$css:!0}},m={0:{rowGap:"xxs79tx",$$css:!0},4:{rowGap:"x1r0jzty",$$css:!0},8:{rowGap:"x3pnbk8",$$css:!0},12:{rowGap:"xp1r0qw",$$css:!0},16:{rowGap:"xgpatz3",$$css:!0},20:{rowGap:"x1kb72lq",$$css:!0},24:{rowGap:"x1na6gtj",$$css:!0}},n={center:{justifyContent:"xl56j7k",$$css:!0},end:{justifyContent:"x13a6bvl",$$css:!0},"space-around":{justifyContent:"x1l1ennw",$$css:!0},"space-between":{justifyContent:"x1qughib",$$css:!0},"space-evenly":{justifyContent:"xaw8158",$$css:!0},start:{justifyContent:"x1nhvcw1",$$css:!0}},o={nowrap:{flexWrap:"xozqiw3",$$css:!0},wrap:{flexWrap:"x1a02dak",$$css:!0},"wrap-reverse":{flexWrap:"x8hhl5t",$$css:!0}};function a(a){var b=a.alignContent,c=a.alignItems,d=a.display;d=d===void 0?"flex":d;var e=a.direction,f=a.justifyContent,g=a.gap,p=a.columnGap,q=a.rowGap;a=a.wrap;p=(p=p)!=null?p:g;q=(q=q)!=null?q:g;return[b!=null&&h[b],c!=null&&i[c],k[d],e!=null&&j[e],f!=null&&n[f],p!=null&&l[p],q!=null&&m[q],a!=null&&o[a]]}g["default"]=a}),98);
__d("GeoFlexbox.react",["GeoPrivateMakeComponent","react","stylex","webFlexItem","webFlexbox"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j=(i||(i=d("react"))).c,k=i;function a(a){var b=j(24),d=a.accessibilityRole,e=a.alignContent,f=a.alignItems,g=a.alignSelf,i=a.basis,l=a.children,m=a.columnGap,n=a.containerRef,o=a["data-testid"],p=a.direction,q=a.display,r=a.element,s=a.gap,t=a.grow,u=a.justifyContent,v=a.order,w=a.rowGap,x=a.shrink,y=a.style,z=a.wrap;a=a.xstyle;q=q===void 0?"flex":q;r=r===void 0?"div":r;var A;b[0]!==e||b[1]!==f||b[2]!==p||b[3]!==q||b[4]!==s||b[5]!==u||b[6]!==z||b[7]!==w||b[8]!==m||b[9]!==g||b[10]!==i||b[11]!==t||b[12]!==v||b[13]!==x||b[14]!==a?(A=(h||(h=c("stylex")))(c("webFlexbox")({alignContent:e,alignItems:f,direction:p,display:q,gap:s,justifyContent:u,wrap:z,rowGap:w,columnGap:m}),c("webFlexItem")({alignSelf:g,basis:i,grow:t,order:v,shrink:x}),a),b[0]=e,b[1]=f,b[2]=p,b[3]=q,b[4]=s,b[5]=u,b[6]=z,b[7]=w,b[8]=m,b[9]=g,b[10]=i,b[11]=t,b[12]=v,b[13]=x,b[14]=a,b[15]=A):A=b[15];e=A;b[16]!==r||b[17]!==e||b[18]!==o||b[19]!==n||b[20]!==d||b[21]!==y||b[22]!==l?(f=k.jsx(r,{className:e,"data-testid":void 0,ref:n,role:d,style:y,children:l}),b[16]=r,b[17]=e,b[18]=o,b[19]=n,b[20]=d,b[21]=y,b[22]=l,b[23]=f):f=b[23];return f}b=d("GeoPrivateMakeComponent").makeGeoComponent("GeoFlexbox",a);g["default"]=b}),98);
__d("MAWFetchSecureMessages",["I64","MAWBridgeSendAndReceive","MAWDbMsg","MAWMiActOnActThreadReady","ReQL","WATagsLogger","asyncToGeneratorRuntime","requireDeferred"],(function(a,b,c,d,e,f,g){"use strict";var h;function i(){var a=babelHelpers.taggedTemplateLiteralLoose(["MAWFetchSecureMessages: threadJid: "," minMsgSortOrderTsResponse ",""]);i=function(){return a};return a}var j=c("requireDeferred")("MWRestoreMessagesFromEB").__setRef("MAWFetchSecureMessages"),k=10;function a(a,b,c,d,e,f,g){return l.apply(this,arguments)}function l(){l=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a,b,c,e,f,g,l){g===void 0&&(g=k);var m=l.addQPLAnnotations,n=l.markQPLFailure,o=l.markQPLPoint,p=l.markQPLStart;l=l.markQPLSuccess;var q=p();m(q,{string:{threadType:(h||(h=d("I64"))).to_string(e)}});function r(a){o(q,"load_more_msgs_success","successfully loaded messages from worker"),m(q,a)}o(q,"before_start_load_more_msgs","before fetching messages range from table");m(q,{string:babelHelpers["extends"]({direction:f,thread_id:h.to_string(c)},e!=null?{thread_type:(h||(h=d("I64"))).to_string(e)}:{})});p=(yield d("ReQL").firstAsync(d("ReQL").fromTableAscending(a.tables.messages_ranges_v2__generated).getKeyRange(c)));try{if(p!=null&&!p.isLoadingBefore&&f==="before"){o(q,"start_load_more_msgs","starting the load more QPL event");e=(yield d("MAWMiActOnActThreadReady").waitForACTThreadReady(a.tables,c,"MAWFetchMoreMessages"));var s=e.chatJid;o(q,"put_message_range","put txn in messages_ranges_v2__generated table");yield b.messages_ranges_v2__generated.put({hasMoreAfter:p.hasMoreAfter,hasMoreBefore:p.hasMoreBefore,isLoadingAfter:p.isLoadingAfter,isLoadingBefore:!0,maxMessageId:p.maxMessageId,maxTimestampMs:p.maxTimestampMs,minMessageId:p.minMessageId,minTimestampMs:p.minTimestampMs,threadKey:p.threadKey});o(q,"send_loadMoreMsgs_to_backend","calling backend with loadMoreMsgs");c=(yield d("MAWBridgeSendAndReceive").sendAndReceive("backend","loadMoreMsgs",{chatJid:s,direction:f,numMsgs:g,offsetMsgId:d("MAWDbMsg").toMsgId(p.minMessageId)}));r({bool:{hasMoreBefore:c.hasMoreBefore}});if(c.hasMoreBefore){l(q);return}var t=(yield d("MAWBridgeSendAndReceive").sendAndReceive("backend","getMaybeNextNonAdminMsgSortOrderMs",{chatJid:s,mayBeAdminMsgId:d("MAWDbMsg").toMsgId(p.minMessageId)}));d("WATagsLogger").TAGS(["labyrinth_web","MAWFetchSecureMessages"]).LOG(i(),s,t.minMsgTimestampMs);o(q,"issued_range_query","MAWFetchSecureMessages: minMsgSortOrderTsResponse "+t.minMsgTimestampMs);l(q);j.onReady(function(b){b({chatJid:s,newerNumMessages:(h||(h=d("I64"))).zero,numMessages:h.of_int32(g),sortOrderMs:h.of_float(t.minMsgTimestampMs),storage:a})})}m(q,{bool:{isLoadingAfter:p==null?void 0:p.isLoadingAfter,isLoadingBefore:p==null?void 0:p.isLoadingBefore}});o(q,"already_loading_messages","end the load more QPL event.");l(q)}catch(a){n(q,a)}});return l.apply(this,arguments)}g["default"]=a}),98);
__d("useMAWQPLLogger",["MAWQPLLogger","react"],(function(a,b,c,d,e,f,g){"use strict";var h,i=(h||d("react")).useMemo;function a(a){return i(function(){return c("MAWQPLLogger")(a)},[a])}g.useMAWQPLLogger=a}),98);
__d("MAWFetchMoreMessages",["Int64Hooks","MAWFetchSecureMessages","MAWSecureLocalDBDataSource","qpl","react","useMAWQPLLogger","useReStore"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j=(i||d("react")).c;function a(){var a=j(1),b;a[0]===Symbol["for"]("react.memo_cache_sentinel")?(b=[],a[0]=b):b=a[0];return d("Int64Hooks").useMemoInt64(k,b)}function k(){return new(c("MAWSecureLocalDBDataSource"))()}function b(a){var b=j(6),e=(h||(h=c("useReStore")))(),f;b[0]===Symbol["for"]("react.memo_cache_sentinel")?(f=c("qpl")._(25303796,"1974"),b[0]=f):f=b[0];var g=d("useMAWQPLLogger").useMAWQPLLogger(f),i;b[1]!==e||b[2]!==a||b[3]!==g?(f=function(b,d,f,h){return c("MAWFetchSecureMessages")(e,b,d,a,f,h,g)},i=[e,g,a],b[1]=e,b[2]=a,b[3]=g,b[4]=f,b[5]=i):(f=b[4],i=b[5]);return d("Int64Hooks").useCallbackInt64(f,i)}g.useSecureDataStorage=a;g.useFetchSecureMessages=b}),98);
__d("MWPFetchMessagesThreadLocks",["FBLogger","I64"],(function(a,b,c,d,e,f,g){"use strict";var h;function a(a,b){var e=(h||(h=d("I64"))).to_string(b);return{lock:{after:function(){var b=f();b.after===!0&&c("FBLogger")("messenger_web_product").mustfix("Locking threadLockStatus twice");b.after=!0;a.set(e,b)},before:function(){var b=f();b.before===!0&&c("FBLogger")("messenger_web_product").mustfix("Locking threadLockStatus twice");b.before=!0;a.set(e,b)}},release:{after:function(){var b=f();b.after=!1;a.set(e,b)},before:function(){var b=f();b.before=!1;a.set(e,b)}},state:f()};function f(){var b=a.get(e);b==null&&(b={after:!1,before:!1},a.set(e,b));return b}}g.localThreadStatus=a}),98);
__d("MWPFetchMessagesPageV2",["FBLogger","LSFactory","LSIntEnum","LSIssueMessagesRangeQueryStoredProcedure","LSMailboxMessagesRangeQueryDirection","LSMessagingThreadTypeUtil","MWPFetchMessagesThreadLocks","asyncToGeneratorRuntime","nullthrows","qex"],(function(a,b,c,d,e,f,g){"use strict";var h;function a(a,b,c,d,e,f,g,h,j){return i.apply(this,arguments)}function i(){i=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a,b,e,f,g,h,i,j,k){var m,o;m=(yield (m=a.tables.messages_ranges_v2__generated).get.apply(m,f));if(m==null)return;o=h&&(yield (o=a.tables.messages_ranges_v2__generated).get.apply(o,h));if(o==null&&h!=null)return;h=d("LSMessagingThreadTypeUtil").isArmadilloSecure(g);var p=i!=null?d("LSMessagingThreadTypeUtil").isArmadilloSecure(i):!1;if(e==="before")if(m.hasMoreBefore)if(h)return l(a,b,e,m,j,g,k);else return n(a,f,m.threadKey,e);else if(o!=null)if(p)return l(a,b,e,o,j,g,k);else return n(a,[o.threadKey,o.minTimestampMs,o.minMessageId],o.threadKey,e);else return;else{e;if(m.hasMoreAfter)if(h)throw c("FBLogger")("messenger_web_product").mustfix("Not possible to fetch more after for secure messages");else return n(a,f,m.threadKey,e);else if(o!=null){p=d("LSMessagingThreadTypeUtil").isArmadilloSecure(c("nullthrows")(i));if(p)throw c("FBLogger")("messenger_web_product").mustfix("Not possible to fetch more after for secure messages");else return n(a,[o.threadKey,o.minTimestampMs,o.minMessageId],o.threadKey,e)}else return}});return i.apply(this,arguments)}var j=new Map(),k=new Map();function l(a,b,c,d,e,f,g){return m.apply(this,arguments)}function m(){m=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a,b,e,f,g,h,i){if(c("qex")._("1016")!==!0){var k=d("MWPFetchMessagesThreadLocks").localThreadStatus(j,f.threadKey);if(k.state[e])return;try{k.lock[e]();var l=(yield a.tables.messages.index("messageId").get(f.minMessageId));return yield g.fetchSecureMessagesProtocol(a,f.threadKey,h,l==null?void 0:l.primarySortKey,f,e,b,"user",i)}finally{k.release[e]()}}});return m.apply(this,arguments)}function n(a,b,c,d){return o.apply(this,arguments)}function o(){o=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a,e,g,i){g=d("MWPFetchMessagesThreadLocks").localThreadStatus(k,g);if(g.state[i])return;try{g.lock[i]();return yield a.runInTransaction(function(){var a=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a){var b;b=(yield (b=a.messages_ranges_v2__generated).get.apply(b,e));if(!b)return;if(b.isLoadingBefore&&i==="before")return;if(b.isLoadingAfter&&i==="after")return;return c("LSIssueMessagesRangeQueryStoredProcedure")(c("LSFactory")(a),{direction:(h||(h=d("LSIntEnum"))).ofNumber(i==="before"?c("LSMailboxMessagesRangeQueryDirection").BEFORE:c("LSMailboxMessagesRangeQueryDirection").AFTER),referenceTimestampMs:b.minTimestampMs,threadKey:b.threadKey})});return function(b){return a.apply(this,arguments)}}(),"readwrite","ui",void 0,f.id+":212")}finally{g.release[i]()}});return o.apply(this,arguments)}g["default"]=a}),98);
__d("MAWPreloadSecureMessages",["I64","LSIntEnum","MAWSecureLocalDBDataSource","MWPFetchMessagesPageV2","Promise","ReQL","asyncToGeneratorRuntime"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j,k=new(c("MAWSecureLocalDBDataSource"))();function a(a,b,c,d,e){return l.apply(this,arguments)}function l(){l=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a,e,f,g,l){var m=(yield d("ReQL").firstAsync(d("ReQL").fromTableDescending(a.tables.messages_ranges_v2__generated).getKeyRange(e)));e=m!=null?[e,m==null?void 0:m.minTimestampMs,m==null?void 0:m.minMessageId]:null;m=g!=null?yield d("ReQL").firstAsync(d("ReQL").fromTableDescending(a.tables.messages_ranges_v2__generated).getKeyRange(g)):null;g=m!=null?[m==null?void 0:m.threadKey,m==null?void 0:m.minTimestampMs,m==null?void 0:m.minMessageId]:null;m=(i||(i=d("I64"))).equal(f,(j||(j=d("LSIntEnum"))).ofNumber(15))?(j||(j=d("LSIntEnum"))).ofNumber(1):(j||(j=d("LSIntEnum"))).ofNumber(2);return e!=null?c("MWPFetchMessagesPageV2")(a,15,"before",e,f,g,m,k,l):(h||(h=b("Promise"))).resolve()});return l.apply(this,arguments)}g.preloadSecureMessages=a}),98);
__d("MWCommunityMessagingNUXQuickPromotionQuery_facebookRelayOperation",[],(function(a,b,c,d,e,f){e.exports="6236665646364985"}),null);
__d("MWCommunityMessagingNUXQuickPromotionQuery$Parameters",["MWCommunityMessagingNUXQuickPromotionQuery_facebookRelayOperation"],(function(a,b,c,d,e,f){"use strict";a={kind:"PreloadableConcreteRequest",params:{id:b("MWCommunityMessagingNUXQuickPromotionQuery_facebookRelayOperation"),metadata:{},name:"MWCommunityMessagingNUXQuickPromotionQuery",operationKind:"query",text:null}};e.exports=a}),null);
__d("MWCommunityMessagingNUXQuickPromotionContainer.entrypoint",["JSResourceForInteraction","MWCommunityMessagingNUXQuickPromotionQuery$Parameters"],(function(a,b,c,d,e,f,g){"use strict";a={getPreloadProps:function(a){return{extraProps:{folderId:a.folderId,isFolderRoute:a.isFolderRoute},queries:{queryRef:{parameters:c("MWCommunityMessagingNUXQuickPromotionQuery$Parameters"),variables:{isFolderRoute:a.isFolderRoute}}}}},root:c("JSResourceForInteraction")("MWCommunityMessagingNUXQuickPromotion.react").__setRef("MWCommunityMessagingNUXQuickPromotionContainer.entrypoint")};g["default"]=a}),98);
__d("MWCommunityMessagingNUXDialog.react",["MWCommunityMessagingNUXQuickPromotionContainer.entrypoint","react","react-relay/relay-hooks/LazyLoadEntryPointContainer_DEPRECATED.react"],(function(a,b,c,d,e,f,g){"use strict";var h,i=(h||(h=d("react"))).c,j=h;function a(a){var d=i(7),e=a.folderId;a=a.isFolderRoute;var f;d[0]===Symbol["for"]("react.memo_cache_sentinel")?(f=b("MWCommunityMessagingNUXQuickPromotionContainer.entrypoint"),d[0]=f):f=d[0];a=a||!1;var g;d[1]!==e||d[2]!==a?(g={folderId:e,isFolderRoute:a},d[1]=e,d[2]=a,d[3]=g):g=d[3];d[4]===Symbol["for"]("react.memo_cache_sentinel")?(e={},d[4]=e):e=d[4];d[5]!==g?(a=j.jsx(c("react-relay/relay-hooks/LazyLoadEntryPointContainer_DEPRECATED.react"),{entryPoint:f,entryPointParams:g,props:e}),d[5]=g,d[6]=a):a=d[6];return a}g["default"]=a}),98);
__d("differenceSets",[],(function(a,b,c,d,e,f){"use strict";function a(a){var b=new Set();for(var c=arguments.length,d=new Array(c>1?c-1:0),e=1;e<c;e++)d[e-1]=arguments[e];FIRST:for(var f=a,g=Array.isArray(f),h=0,f=g?f:f[typeof Symbol==="function"?Symbol.iterator:"@@iterator"]();;){var i;if(g){if(h>=f.length)break;i=f[h++]}else{h=f.next();if(h.done)break;i=h.value}var j=i;for(var k=0;k<d.length;k++){var l=d[k];if(l.has(j))continue FIRST}b.add(j)}return b}f["default"]=a}),66);
__d("isFalsey",[],(function(a,b,c,d,e,f){"use strict";function a(a){return a==null||!Boolean(a)}f["default"]=a}),66);
__d("mapSet",[],(function(a,b,c,d,e,f){"use strict";function a(a,b){var c=new Set();for(var a=a,d=Array.isArray(a),e=0,a=d?a:a[typeof Symbol==="function"?Symbol.iterator:"@@iterator"]();;){var f;if(d){if(e>=a.length)break;f=a[e++]}else{e=a.next();if(e.done)break;f=e.value}f=f;c.add(b(f))}return c}f["default"]=a}),66);
__d("useForceUpdate",["react"],(function(a,b,c,d,e,f,g){"use strict";var h,i=(h||d("react")).useReducer;function a(){var a=i(j,0);a[0];a=a[1];return a}function j(a){return a+1}g["default"]=a}),98);
__d("useStyleXTransition",["differenceSets","mapMapToArray","mapSet","nullthrows","react","setImmediate","sortBy","useForceUpdate","useIsMountedRef","useStable"],(function(a,b,c,d,e,f,g){"use strict";var h;b=h||d("react");var i=b.useCallback,j=b.useEffect,k=b.useLayoutEffect,l=b.useRef,m=b.c;e=window;var n=e.clearTimeout,o=e.requestAnimationFrame,p=e.setTimeout;function q(){var a=m(3),b=c("useStable")(r),d;a[0]!==b?(d=function(){return function(){return Array.from(b.values()).forEach(n)}},a[0]=b,a[1]=d):d=a[1];var e;a[2]===Symbol["for"]("react.memo_cache_sentinel")?(e=[],a[2]=e):e=a[2];j(d,e);return b}function r(){return new Map()}function s(){var a=m(3),b=c("useForceUpdate")(),d=c("useIsMountedRef")(),e;a[0]!==d.current||a[1]!==b?(e=function(){return function(){d.current&&b()}},a[0]=d.current,a[1]=b,a[2]=e):e=a[2];return c("useStable")(e)}function a(a,b,d,e){var f=s(),g=q(),h=c("useStable")(function(){return new Map()}),j=l(!0),m=d.enter,r=d.leave,t=d.base,u=d.duration,v=u===void 0?100:u,w=d.durationIn,x=d.durationOut,y=d.onEnter,z=d.onLeave,A=d.onEnterComplete,B=d.onLeaveComplete,C=i(function(a,b,c){return{item:b,key:a,order:c,xstyle:[t,j.current&&m],style:{transitionDuration:((b=w)!=null?b:v)+"ms"}}},[t,m,w,v]),D=new Map(a.map(function(a,c){return[b(a),{item:a,order:c}]})),E=c("differenceSets")(new Set(D.keys()),new Set(h.keys())),F=c("differenceSets")(new Set(h.keys()),new Set(D.keys())),G=new Map();u=Array.from(c("mapSet")(F,function(a){a=c("nullthrows")(h.get(a));a=a.order;return a})).sort(function(a,b){return a-b});u.forEach(function(b,c){b=b-c;while(b<a.length){c=(c=G.get(b))!=null?c:0;G.set(b,c+1);b+=1}});d=c("sortBy")([].concat(c("mapMapToArray")(h,function(a){var b=a.key;b=D.get(b);if(b){return babelHelpers["extends"]({},a,{item:b.item,order:b.order+((b=G.get(b.order))!=null?b:0)})}return a}),Array.from(c("mapSet")(E,function(a){var b=c("nullthrows")(D.get(a)),d=b.item;b=b.order;return C(a,d,b)}))),function(a){return a.order});k(function(){if(e===!0)return;a.forEach(function(a,d){var e,i=b(a),j=(e=h.get(i))!=null?e:C(i,a,d);E.has(i)&&o(function(){var b;j.xstyle=[t,m];n(g.get(i));g.set(i,p(function(){A&&A(a)},(b=w)!=null?b:v));c("setImmediate")(function(){j.xstyle=[t,m],y&&y(a),f()})});j.item=a;j.order=d+((e=G.get(d))!=null?e:0);h.set(i,j)});Array.from(F.values()).forEach(function(a){var b=h.get(a);if(b==null)return;var d=b.item;if(b.status!=="leaving"){var e;b.status="leaving";b.style={transitionDuration:((e=x)!=null?e:v)+"ms"};o(function(){var e;b.xstyle=[t,r];n(g.get(a));g.set(a,p(function(){h["delete"](a),B&&B(d),f()},(e=x)!=null?e:v));c("setImmediate")(function(){z&&z(d),f()})})}});j.current=!1});return d}g["default"]=a}),98);