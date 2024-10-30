;/*FB_PKG_DELIM*/

__d("AudioContextSingleton",["FBLogger"],(function(a,b,c,d,e,f,g){var h=window.AudioContext||window.webkitAudioContext||window.mozAudioContext,i=new Map();a={get:function(a){a=a==null?void 0:a.sampleRate;var b=i.get(a);if(b==null){var d=new h({sampleRate:a});i.set(a,d);return d}if(b.state==="closed"){c("FBLogger")("project").warn("AudioContext Singleton has been closed");d=new h({sampleRate:a});i.set(a,d);return d}return b}};b=a;g["default"]=b}),98);
__d("EmojiFormat.bs",[],(function(a,b,c,d,e,f){"use strict";function g(a){return a.split("_").map(function(a){return parseInt(a,16)})}function a(a){return a.map(function(a){return a.toString(16)}).join("_")}function h(a){return a.map(function(a){return String.fromCodePoint(a)}).join("")}function b(a){return h(g(a))}f.codeStringToCodeArray=g;f.codeArrayToCodeString=a;f.codeArrayToUnicode=h;f.codeStringToUnicode=b}),66);
__d("LSEmojiSetsType",[],(function(a,b,c,d,e,f){a=Object.freeze({USER_GENERATED:0,RECENTLY_USED:1});f["default"]=a}),66);
__d("LSSetLoadingAfterOnMessageRanges",[],(function(a,b,c,d,e,f){function a(){var a=arguments,b=a[a.length-1],c=[];return b.sequence([function(c){return b.sortBy(b.db.table(13).fetch([[[a[0]]]]),[["maxTimestampMs","DESC"]]).next().then(function(a,c){var d=a.done;a=a.value;return d?0:(c=a.item,b.forEach(b.filter(b.db.table(13).fetch([[[c.threadKey,c.minTimestampMs,c.minMessageId]]]),function(a){return b.i64.eq(a.threadKey,c.threadKey)&&b.i64.eq(b.i64.cast([0,0]),b.i64.cast([0,0]))&&b.i64.eq(a.minTimestampMs,c.minTimestampMs)&&a.minMessageId===c.minMessageId}),function(a){var b=a.update;a.item;return b({isLoadingAfter:!0})}))})},function(a){return b.resolve(c)}])}a.__sproc_name__="LSMailboxSetLoadingAfterOnMessageRangesStoredProcedure";e.exports=a}),null);
__d("LSReportThreadViewOpen",["LSIssueNewTaskWithExtraOperations","LSSetLoadingAfterOnMessageRanges"],(function(a,b,c,d,e,f){function a(){var a=arguments,c=a[a.length-1],d=[],e=[];return c.sequence([function(e){return c.sequence([function(b){return c.db.table(9).fetch([[[a[0]]]]).next().then(function(a,b){var c=a.done;a=a.value;return c?(c=[void 0,void 0],d[0]=c[0],d[1]=c[1],c):(b=a.item,c=[b.syncGroup,b.threadType],d[0]=c[0],d[1]=c[1],c)})},function(a){return c.i64.neq(d[0],void 0)?c.sequence([function(a){return c.db.table(1).fetch([[[d[0]]]]).next().then(function(a,b){var c=a.done;a=a.value;return c?d[14]=void 0:(b=a.item,d[14]=b.syncParams)})},function(a){return d[3]=d[14]}]):c.resolve(d[3]=void 0)},function(b){return c.islc(c.filter(c.db.table(12).fetch([[[a[0]]]]),function(b){return c.i64.eq(b.threadKey,a[0])&&c.i64.eq(b.authorityLevel,c.i64.cast([0,80]))}),0,c.i64.to_float(c.i64.cast([0,1]))).next().then(function(a,b){var c=a.done;a=a.value;return c?d[4]=void 0:(b=a.item,d[4]=b.timestampMs)})},function(b){return c.db.table(294).fetch([[[a[0]]]]).next().then(function(a,b){var e=a.done;a=a.value;return e?(e=[!1,c.i64.cast([0,0]),void 0],d[6]=e[0],d[7]=e[1],d[8]=e[2],e):(b=a.item,e=[b.isStale,b.threadQueueSequenceId,b.lastSelectiveSyncTimestampMs],d[6]=e[0],d[7]=e[1],d[8]=e[2],e)})},function(a){return d[6]?d[10]=!0:d[10]=!1,c.i64.neq(d[8],void 0)?(c.i64.eq(d[1],c.i64.cast([0,152]))?d[14]=c.i64.cast([0,0]):d[14]=c.i64.cast([0,0]),d[15]=c.i64.of_float(Date.now()),c.resolve()):c.resolve()},function(e){return d[11]=new c.Map(),d[11].set("thread_key",a[0]),d[11].set("is_stale",d[10]),d[11].set("client_seq_id",d[7]),d[11].set("sync_params_encoded",d[3]),d[11].set("client_last_sync_timestamp_ms",d[8]),d[11].set("sync_group",d[0]),d[11].set("last_message_timestamp_ms",d[4]),d[12]=d[11].get("thread_key"),d[11],d[13]=c.toJSON(d[11]),c.storedProcedure(b("LSIssueNewTaskWithExtraOperations"),["report_thread_view_open","_",c.i64.to_string(d[12])].join(""),c.i64.cast([0,605]),d[13],void 0,void 0,c.i64.cast([0,0]),c.i64.cast([0,0]),void 0,void 0,c.i64.cast([0,0]),void 0,c.i64.cast([0,0]))}])},function(a){return c.resolve(e)}])}a.__sproc_name__="LSMailboxReportThreadViewOpenStoredProcedure";e.exports=a}),null);
__d("LSReportThreadViewOpenStoredProcedure",["LSReportThreadViewOpen","cr:8709"],(function(a,b,c,d,e,f,g){function a(a,b){return c("LSReportThreadViewOpen")(b.threadKey,a)}g["default"]=a}),98);
__d("LSThreadPointQueryTTRCStatus",[],(function(a,b,c,d,e,f){a=Object.freeze({COMPLETED:1,SKIPPED:2});f["default"]=a}),66);
__d("MAWSecureComposerText",["Lexical","LexicalText","MAWJids","MessengerLexicalEntityTextNode"],(function(a,b,c,d,e,f,g){"use strict";function a(a){return a.read(function(){var a=d("Lexical").$getRoot().getFirstChild();return a instanceof d("Lexical").ElementNode?a.getChildren().reduce(function(a,b){if(d("MessengerLexicalEntityTextNode").isMessengerLexicalEntityTextNode(b)){var c=b.getEntity();return a+("@"+d("MAWJids").toUserJid(c.id))}return a+b.getTextContent()},""):d("LexicalText").$rootTextContent()})}g.getTextFromEditorState=a}),98);
__d("MDSLockSvgIcon.react",["MDSSvgIcon.react","react"],(function(a,b,c,d,e,f,g){"use strict";var h,i=(h||(h=d("react"))).c,j=h;function a(a){var b=i(3),d;b[0]===Symbol["for"]("react.memo_cache_sentinel")?(d=j.jsx("path",{clipRule:"evenodd",d:"M12.25 15.5a.25.25 0 00.25-.25V12a5.5 5.5 0 1111 0v3.25c0 .138.112.25.25.25h.75a2 2 0 012 2v9a2 2 0 01-2 2h-13a2 2 0 01-2-2v-9a2 2 0 012-2h.75zm3 0h5.5a.25.25 0 00.25-.25V12a3 3 0 10-6 0v3.25c0 .138.112.25.25.25z",fillRule:"evenodd"}),b[0]=d):d=b[0];b[1]!==a?(d=j.jsx(c("MDSSvgIcon.react"),babelHelpers["extends"]({},a,{children:d})),b[1]=a,b[2]=d):d=b[2];return d}g["default"]=a}),98);
__d("MWCMSelectiveSyncTTRCQPLLoggingUtils",["I64","QPLUserFlow","ReQL","ReQLSuspense","qpl","react","useReStore"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j,k=(j||d("react")).c,l=c("qpl")._(25310806,"1365");function a(a){var b,e=(h||(h=c("useReStore")))();b=(b=d("ReQLSuspense").useArray(function(){return d("ReQL").fromTableAscending(e.tables.messages.index("messageDisplayOrder")).getKeyRange(a).take(20)},[e,a],f.id+":35"))!=null?b:[];return b}function b(a){var b=k(6),e=(h||(h=c("useReStore")))(),g;b[0]!==e.tables.thread_point_query_ttrc||b[1]!==a?(g=function(){return d("ReQL").fromTableAscending(e.tables.thread_point_query_ttrc).getKeyRange(a)},b[0]=e.tables.thread_point_query_ttrc,b[1]=a,b[2]=g):g=b[2];var i;b[3]!==e||b[4]!==a?(i=[e,a],b[3]=e,b[4]=a,b[5]=i):i=b[5];b=d("ReQLSuspense").useFirst(g,i,f.id+":48");if(b!=null)return b}function e(a,b,d){c("QPLUserFlow").endSuccess(l,{annotations:{string:{hasMessageDataChanged:b,status:"completed"}},instanceKey:a,timestamp:(b=d)!=null?b:void 0})}function m(a,b,e,f){c("QPLUserFlow").start(l,{annotations:{string:{thread_id:(i||(i=d("I64"))).to_string(b),thread_subtype:f?(i||(i=d("I64"))).to_string(f):null,thread_type:i.to_string(e)}},instanceKey:a})}function n(a,b){c("QPLUserFlow").addPoint(l,b,{instanceKey:a})}function o(a){c("QPLUserFlow").addPoint(l,"selective_sync_remediation_end",{instanceKey:a}),c("QPLUserFlow").endSuccess(l,{annotations:{string:{status:"skipped"}},instanceKey:a})}function p(a,b){return a.length!==b.length?!1:!a.some(function(a,c){c=b[c];c.text;c=babelHelpers.objectWithoutPropertiesLoose(c,["text"]);a.text;a=babelHelpers.objectWithoutPropertiesLoose(a,["text"]);if(JSON.stringify(c)!==JSON.stringify(a))return!0})}g.useLast20Messages=a;g.useTPQEntry=b;g.logCompleteEndSuccess=e;g.logEventStreamStart=m;g.logPoint=n;g.logSkippedEndSuccess=o;g.isMessageDataUnchanged=p}),98);
__d("MWChatMessengerReactionsUtils",["EmojiFormat.bs","I64","LSEmojiSetsType","LSIntEnum"],(function(a,b,c,d,e,f,g){"use strict";var h,i;b=[{categoryIdx:(h||(h=d("I64"))).of_string("6"),emoji:"\u2764",emojiIdx:h.zero,sortKey:h.zero,type_:(i||(i=d("LSIntEnum"))).ofNumber(c("LSEmojiSetsType").USER_GENERATED)},{categoryIdx:h.zero,emoji:"\ud83d\ude06",emojiIdx:h.of_string("4"),sortKey:h.one,type_:i.ofNumber(c("LSEmojiSetsType").USER_GENERATED)},{categoryIdx:h.zero,emoji:"\ud83d\ude2e",emojiIdx:h.of_string("84"),sortKey:h.of_string("2"),type_:i.ofNumber(c("LSEmojiSetsType").USER_GENERATED)},{categoryIdx:h.zero,emoji:"\ud83d\ude22",emojiIdx:h.of_string("48"),sortKey:h.of_string("3"),type_:i.ofNumber(c("LSEmojiSetsType").USER_GENERATED)},{categoryIdx:h.zero,emoji:"\ud83d\ude21",emojiIdx:h.of_string("52"),sortKey:h.of_string("4"),type_:i.ofNumber(c("LSEmojiSetsType").USER_GENERATED)},{categoryIdx:h.zero,emoji:"\ud83d\udc4d",emojiIdx:h.of_string("131"),sortKey:h.of_string("5"),type_:i.ofNumber(c("LSEmojiSetsType").USER_GENERATED)},{categoryIdx:h.zero,emoji:"\ud83d\udc4e",emojiIdx:h.of_string("132"),sortKey:h.of_string("6"),type_:i.ofNumber(c("LSEmojiSetsType").USER_GENERATED)}];e=b.slice(0,6);var j=d("EmojiFormat.bs").codeArrayToUnicode([10084,65039]),k=d("EmojiFormat.bs").codeArrayToUnicode([10084]);function a(a){if(a===j)return!0;else return a===k}f=6;g.defaultStaticReactions=b;g.defaultCustomizableReactions=e;g.heartType1=j;g.heartType2=k;g.isHeart=a;g.cUSTOM_REACTIONS_NUM=f}),98);
__d("MWChatReactionEmoji",["cr:4707"],(function(a,b,c,d,e,f,g){"use strict";g["default"]=b("cr:4707")}),98);
__d("MWChatReactionsUtils",["MetaConfig","cr:3890"],(function(a,b,c,d,e,f,g){"use strict";function a(){var a=c("MetaConfig")._("58");return new Set(a.split(",").map(function(a){return{codepoints:[a.codePointAt(0)],id:a}}))}g.cUSTOM_REACTIONS_NUM=(d=b("cr:3890")).cUSTOM_REACTIONS_NUM;g.defaultStaticReactions=d.defaultStaticReactions;g.defaultCustomizableReactions=d.defaultCustomizableReactions;g.heartType1=d.heartType1;g.heartType2=d.heartType2;g.isHeart=d.isHeart;g.getHarmfulEmojisForBroadcastChannels=a}),98);
__d("MWChatTypingIndicator.react",["MessengerWebUXLogger","react","react-strict-dom"],(function(a,b,c,d,e,f,g){"use strict";var h,i=(h||(h=d("react"))).c,j=h,k={dot:{alignItems:"x6s0dn4",animationDuration:"xmg6eyc",animationIterationCount:"xa4qsjk",animationName:"xwnhzmj",animationTimingFunction:"x4hg4is",backgroundColor:"x1iuwi03",borderTopStartRadius:"xm3z3ea",borderTopEndRadius:"x1x8b98j",borderBottomEndRadius:"x131883w",borderBottomStartRadius:"x16mih1h",display:"x78zum5",height:"xqu0tyb",marginStart:"xgzva0m",marginEnd:"xhhsvwb",marginLeft:null,marginRight:null,width:"x51ohtg",$$css:!0},dot1:{animationDelay:"x1t83zlg",$$css:!0},dot1Opacity:{animationDelay:"x1uzojwf",$$css:!0},dot2:{animationDelay:"x1x1c4bx",$$css:!0},dot2Opacity:{animationDelay:"xfjzax6",$$css:!0},dot3:{animationDelay:"x1xwhvez",$$css:!0},dot3Opacity:{animationDelay:"x1la68h3",$$css:!0},dotOpacity:{animationDuration:"xmg6eyc",animationIterationCount:"xa4qsjk",animationName:"x1bcwpiy",animationTimingFunction:"x4hg4is",opacity:"x1hc1fzr",$$css:!0},root:{alignItems:"x6s0dn4",display:"x78zum5",height:"x1ta3ar0",$$css:!0}};function a(a){var b=i(10);a=a.threadType;var e;b[0]!==a?(e={eventName:"show_typing_indicators",threadType:a},b[0]=a,b[1]=e):e=b[1];a=c("MessengerWebUXLogger").useImpressionLoggerRef(e);b[2]===Symbol["for"]("react.memo_cache_sentinel")?(e=[k.dotOpacity,k.dot1Opacity],b[2]=e):e=b[2];b[3]===Symbol["for"]("react.memo_cache_sentinel")?(e=j.jsx(d("react-strict-dom").html.div,{style:e,children:j.jsx(d("react-strict-dom").html.div,{style:[k.dot,k.dot1]})}),b[3]=e):e=b[3];var f;b[4]===Symbol["for"]("react.memo_cache_sentinel")?(f=[k.dotOpacity,k.dot2Opacity],b[4]=f):f=b[4];b[5]===Symbol["for"]("react.memo_cache_sentinel")?(f=j.jsx(d("react-strict-dom").html.div,{style:f,children:j.jsx(d("react-strict-dom").html.div,{style:[k.dot,k.dot2]})}),b[5]=f):f=b[5];var g;b[6]===Symbol["for"]("react.memo_cache_sentinel")?(g=[k.dotOpacity,k.dot3Opacity],b[6]=g):g=b[6];b[7]===Symbol["for"]("react.memo_cache_sentinel")?(g=j.jsx(d("react-strict-dom").html.div,{style:g,children:j.jsx(d("react-strict-dom").html.div,{style:[k.dot,k.dot3]})}),b[7]=g):g=b[7];b[8]!==a?(e=j.jsxs(d("react-strict-dom").html.div,{ref:a,style:k.root,children:[e,f,g]}),b[8]=a,b[9]=e):e=b[9];return e}g["default"]=a}),98);
__d("MessengerIntent",["WebStorage","justknobx"],(function(a,b,c,d,e,f,g){"use strict";var h,i="mw_sent_message";function j(){return c("justknobx")._("1630")}function a(){(h||(h=c("WebStorage"))).setItemGuarded(h.getLocalStorage(),i,String(Date.now()))}function b(){var a=(h||(h=c("WebStorage"))).getLocalStorage();return Date.now()-Number(a==null?void 0:a.getItem(i))<j()}g.sentMessage=a;g.hasSentMessagesRecently=b}),98);
__d("MWLSLogSend",["CometHeroLogging","I64","MWChatInteraction","MWSharedMsgLogUtils","MessengerIntent"],(function(a,b,c,d,e,f,g){"use strict";var h;function a(a,b,e){var f=e.isCommunityEvent,g=e.isMessageRequest,i=e.source;e=e.threadType;var j=c("CometHeroLogging").genHeroInteractionUUIDAndMarkStart(a.getTraceId());d("MWChatInteraction").set(b,j);j={entrypoint:d("MWSharedMsgLogUtils").getEntrypointAnnotation(i),is_community_event:f===!0?"true":"false",is_message_request:g===!0?"true":"false",thread_type:e==null?"unknown":(h||(h=d("I64"))).to_string(e)};Object.entries(j).forEach(function(b){var c=b[0];b=b[1];a.addMetadata(c,String(b))});d("MessengerIntent").sentMessage();return a.onComplete(function(){delete d("MWChatInteraction").interactions[b]})}g.logSentHeroInteraction=a}),98);
__d("MWMessageTableFocusTable.react",["fbt","CometKeys","FocusTable.react","emptyFunction","react"],(function(a,b,c,d,e,f,g,h){"use strict";var i;i||d("react");var j="messages_table";a=function(a,b,c){return c.getAttribute("data-scope")===j};b=d("FocusTable.react").createFocusTable(a);e={key:c("CometKeys").UP};f={key:c("CometKeys").DOWN};d={key:c("CometKeys").LEFT};var k={key:c("CometKeys").RIGHT};e=[{command:e,description:h._("__JHASH__HYvhkJNYo2M__JHASH__"),handler:c("emptyFunction")},{command:f,description:h._("__JHASH__6tFY25IlnV4__JHASH__"),handler:c("emptyFunction")},{command:d,description:h._("__JHASH__6tFY25IlnV4__JHASH__"),handler:c("emptyFunction")},{command:k,description:h._("__JHASH__HYvhkJNYo2M__JHASH__"),handler:c("emptyFunction")}];g.scopeID=j;g.scopeQuery=a;g.FocusTable=b;g.commandConfigs=e}),226);
__d("MWMessageCellFocusTable.react",["fbt","CometComponentWithKeyCommands.react","CometKeys","FocusTable.react","MWMessageTableFocusTable.react","focusScopeQueries","react"],(function(a,b,c,d,e,f,g,h){"use strict";var i,j=(i||(i=d("react"))).c,k=i;b=d("FocusTable.react").createFocusTable(d("focusScopeQueries").tabbableScopeQuery);var l={key:c("CometKeys").ESCAPE},m={key:c("CometKeys").ENTER},n={key:c("CometKeys").SPACE},o=h._("__JHASH__dr5LK8JTLfs__JHASH__"),p=h._("__JHASH__NgBmedKphX2__JHASH__");function a(a){var b=j(9),e=a.children,f=a.onEnter,g=a.onEscape;a=a.onSpace;var h;if(b[0]!==g||b[1]!==f||b[2]!==a){var i=[];g!=null&&i.push({command:l,description:o,handler:g});f!=null&&i.push({command:m,description:p,handler:f});a!=null&&i.push({command:n,description:p,handler:a});h=c("CometComponentWithKeyCommands.react");i=d("MWMessageTableFocusTable.react").commandConfigs.concat(i);b[0]=g;b[1]=f;b[2]=a;b[3]=h;b[4]=i}else h=b[3],i=b[4];b[5]!==h||b[6]!==i||b[7]!==e?(g=k.jsx(h,{commandConfigs:i,xstyle:!1,children:e}),b[5]=h,b[6]=i,b[7]=e,b[8]=g):g=b[8];return g}e=a;g.FocusTable=b;g.keyCommands=e}),226);
__d("MarketplaceCometReviewOffersDialogQuery_facebookRelayOperation",[],(function(a,b,c,d,e,f){e.exports="26215706471376969"}),null);
__d("MarketplaceCometReviewOffersDialogQuery$Parameters",["MarketplaceCometReviewOffersDialogQuery_facebookRelayOperation"],(function(a,b,c,d,e,f){"use strict";a={kind:"PreloadableConcreteRequest",params:{id:b("MarketplaceCometReviewOffersDialogQuery_facebookRelayOperation"),metadata:{},name:"MarketplaceCometReviewOffersDialogQuery",operationKind:"query",text:null}};e.exports=a}),null);
__d("MarketplaceCometReviewOffersDialog.entrypoint",["JSResourceForInteraction","MarketplaceCometReviewOffersDialogQuery$Parameters","WebPixelRatio"],(function(a,b,c,d,e,f,g){"use strict";a={getPreloadProps:function(a){a=a.listingId;return{queries:{queryReference:{options:{fetchPolicy:"network-only"},parameters:c("MarketplaceCometReviewOffersDialogQuery$Parameters"),variables:{listingId:a,scale:d("WebPixelRatio").get()}}}}},root:c("JSResourceForInteraction")("MarketplaceCometReviewOffersDialog.react").__setRef("MarketplaceCometReviewOffersDialog.entrypoint")};g["default"]=a}),98);
__d("Popup",["isTruthy"],(function(a,b,c,d,e,f,g){function a(a,b,d,e){var f=[];c("isTruthy")(b)&&f.push("width="+b);c("isTruthy")(d)&&f.push("height="+d);var g=document.body;if(g!=null&&b!=null&&b!==0&&d!=null&&d!==0){var h="screenX"in window?window.screenX:window.screenLeft,i="screenY"in window?window.screenY:window.screenTop,j="outerWidth"in window?window.outerWidth:g.clientWidth;g="outerHeight"in window?window.outerHeight:g.clientHeight-22;h=Math.floor(h+(j-b)/2);j=Math.floor(i+(g-d)/2.5);f.push("left="+h);f.push("top="+j)}f.push("scrollbars");return window.open(a,e!=null&&e!==""?e:"_blank",f.join(","))}g.open=a}),98);
__d("SelectiveSyncTTRCLogger.react",["CometPlaceholder.react","I64","Int64Hooks","LSIntEnum","LSThreadPointQueryTTRCStatus","MWCMSelectiveSyncTTRCQPLLoggingUtils","Random","ReQL","ReQLSuspense","areEqual","react","useReStore"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j,k,l,m=l||(l=d("react"));b=l;var n=b.useRef,o=b.c;function p(a){var b=o(31),e=a.instanceKey,g=a.isReportThreadViewOpenSprocCalled,l=a.reportThreadViewOpenCalledTimestamp,m=a.setInstanceKey,p=a.threadKey,q=a.threadSubtype,r=a.threadType,s=n(!1);a=(h||(h=c("useReStore")))();var t;b[0]!==a.tables.messages||b[1]!==p?(t=d("ReQLSuspense").toArray(d("ReQL").fromTableDescending(a.tables.messages.index("messageDisplayOrder")).getKeyRange(p).take(20),f.id+":56"),b[0]=a.tables.messages,b[1]=p,b[2]=t):t=b[2];var u=t;b[3]!==a.tables.reactions||b[4]!==p?(t=d("ReQLSuspense").toArray(d("ReQL").fromTableDescending(a.tables.reactions).getKeyRange(p).take(20),f.id+":61"),b[3]=a.tables.reactions,b[4]=p,b[5]=t):t=b[5];var v=t;b[6]!==a.tables.reactions_v2||b[7]!==p?(t=d("ReQLSuspense").toArray(d("ReQL").fromTableDescending(a.tables.reactions_v2).getKeyRange(p).take(20),f.id+":64"),b[6]=a.tables.reactions_v2,b[7]=p,b[8]=t):t=b[8];var w=t;b[9]!==g||b[10]!==e||b[11]!==p||b[12]!==r||b[13]!==q?(a=function(){g===!1&&(s.current=!0,d("MWCMSelectiveSyncTTRCQPLLoggingUtils").logEventStreamStart(e,p,r,q))},b[9]=g,b[10]=e,b[11]=p,b[12]=r,b[13]=q,b[14]=a):a=b[14];b[15]!==e||b[16]!==g||b[17]!==l||b[18]!==p||b[19]!==q||b[20]!==r?(t=[e,g,l,p,q,r],b[15]=e,b[16]=g,b[17]=l,b[18]=p,b[19]=q,b[20]=r,b[21]=t):t=b[21];d("Int64Hooks").useEffectInt64(a,t);var x=n(u),y=n(v),z=n(w),A=d("MWCMSelectiveSyncTTRCQPLLoggingUtils").useTPQEntry(p);b[22]!==A||b[23]!==l||b[24]!==e||b[25]!==m||b[26]!==u||b[27]!==v||b[28]!==w?(a=function(){var a=A==null?void 0:A.status,b=A==null?void 0:A.deltaInsertionTimestampMs,f=A==null?void 0:A.dasmExecutionTimestampMs;if(s.current===!0&&l!==0)if(a&&(j||(j=d("I64"))).equal(a,(k||(k=d("LSIntEnum"))).ofNumber(c("LSThreadPointQueryTTRCStatus").SKIPPED)))d("MWCMSelectiveSyncTTRCQPLLoggingUtils").logSkippedEndSuccess(e),s.current=!1,m(c("Random").uint32());else if(a!=null&&(j||(j=d("I64"))).equal(a,(k||(k=d("LSIntEnum"))).ofNumber(c("LSThreadPointQueryTTRCStatus").COMPLETED))&&b!=null&&(j||(j=d("I64"))).to_float(b)>l){d("MWCMSelectiveSyncTTRCQPLLoggingUtils").logPoint(e,"selective_sync_remediation_end");a=!d("MWCMSelectiveSyncTTRCQPLLoggingUtils").isMessageDataUnchanged(x.current,u);var g=!(i||(i=c("areEqual")))(y.current,v),h=!i(z.current,w);a||g||h?d("MWCMSelectiveSyncTTRCQPLLoggingUtils").logCompleteEndSuccess(e,"true",f!=null?(j||(j=d("I64"))).to_float(f):void 0):d("MWCMSelectiveSyncTTRCQPLLoggingUtils").logCompleteEndSuccess(e,"false",b!=null?(j||(j=d("I64"))).to_float(b):void 0);x.current=u;y.current=v;z.current=w;s.current=!1;m(c("Random").uint32())}},t=[e,u,v,w,l,m,A],b[22]=A,b[23]=l,b[24]=e,b[25]=m,b[26]=u,b[27]=v,b[28]=w,b[29]=a,b[30]=t):(a=b[29],t=b[30]);d("Int64Hooks").useEffectInt64(a,t);return null}function a(a){var b=o(2),d;b[0]!==a?(d=m.jsx(c("CometPlaceholder.react"),{fallback:null,name:"SelectiveSyncTTRCLogger",children:m.jsx(p,babelHelpers["extends"]({},a))}),b[0]=a,b[1]=d):d=b[1];return d}g["default"]=a}),98);
__d("WebGraphQLLegacyHelper",["invariant"],(function(a,b,c,d,e,f,g,h){"use strict";function a(a){var b=a.controller,c=a.docID,d=a.queryID,e=a.variables;a=a.legacyResponseFormat;c!=d&&(c||d)!=null||h(0,5819,c,d);b=b.getURIBuilder();d?b.setFBID("query_id",d):b.setFBID("doc_id",c);a&&b.setBool("legacy_response_format",!0);e&&b.setString("variables",JSON.stringify(e));return b.getURI()}g.getURI=a}),98);
__d("flattenArray",[],(function(a,b,c,d,e,f){function a(a){var b=[];g(a,b);return b}function g(a,b){var c=a.length,d=0;while(c--){var e=a[d++];Array.isArray(e)?g(e,b):b.push(e)}}f["default"]=a}),66);
__d("useIsSecureMessageData",["ReQL","ReQLSuspense","react","useIsSecureMessage","useReStore"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j=(i||d("react")).c;function a(a,b){var e=j(6),g=(h||(h=c("useReStore")))(),i=a.messageId,k=a.messageThreadKey,l=a.messageTimestamp,m;e[0]!==i||e[1]!==k||e[2]!==l||e[3]!==g.tables.messages?(a=function(){return i==null||k==null||l==null?d("ReQL").empty():d("ReQL").fromTableAscending(g.tables.messages).getKeyRange(k,l,i)},m=[g.tables.messages,k,l,i],e[0]=i,e[1]=k,e[2]=l,e[3]=g.tables.messages,e[4]=a,e[5]=m):(a=e[4],m=e[5]);e=d("ReQLSuspense").useFirst(a,m,f.id+":38");a=c("useIsSecureMessage")(g,e,b);return a}g["default"]=a}),98);
__d("useReportThreadViewOpenDebounced",["LSFactory","LSReportThreadViewOpenStoredProcedure","promiseDone","react","useDebouncedComet","useReStore"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j=(i||d("react")).c;function a(a,b){var d=j(5),e=(h||(h=c("useReStore")))(),g;d[0]!==e||d[1]!==a?(g=function(){c("promiseDone")(e.runInTransaction(function(b){return c("LSReportThreadViewOpenStoredProcedure")(c("LSFactory")(b),{threadKey:a})},"readwrite",void 0,void 0,f.id+":33"))},d[0]=e,d[1]=a,d[2]=g):g=d[2];var i;d[3]!==b?(i={leading:!0,wait:b},d[3]=b,d[4]=i):i=d[4];return c("useDebouncedComet")(g,i)}g["default"]=a}),98);
__d("useMWReportThreadOpenOnMountAndFocusWithLogger",["GroupsCometChatsEngagementLogger","I64","Int64Hooks","LSMessagingThreadTypeUtil","MWCMSelectiveSyncTTRCQPLLoggingUtils","MetaConfig","Random","SelectiveSyncTTRCLogger.react","ServerTime","VisibilityAPI","mwCMIsAnyCMThread","react","useReStore","useReportThreadViewOpenDebounced"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j,k=j||(j=d("react"));b=j;var l=b.useRef,m=b.useState,n=c("MetaConfig")._("43");function a(a,b){var e=(h||(h=c("useReStore")))(),f=m(0),g=f[0],j=f[1];f=m(d("Random").uint32());var o=f[0];f=f[1];var p=c("mwCMIsAnyCMThread")(a.threadType),q=l(!1),r=p||c("MetaConfig")._("55")&&(d("LSMessagingThreadTypeUtil").isSocialChannelV2(a.threadType)||d("LSMessagingThreadTypeUtil").isDiscoverablePublicBroadcastChannel(a.threadType)),s=c("useReportThreadViewOpenDebounced")(a.threadKey,(b=b)!=null?b:n);d("Int64Hooks").useEffectInt64(function(){var b=null;r&&(b=d("VisibilityAPI").onVisibilityChange(function(){d("VisibilityAPI").isVisibilityHidden()||s()}),p&&d("GroupsCometChatsEngagementLogger").log({action:"background_effect",community_id:(i||(i=d("I64"))).to_string(a.parentThreadKey),event:"report_thread_view_open",source:"blended_threadlist_community_tab",surface:"thread_view",thread_id:(i||(i=d("I64"))).to_string(a.threadKey)}),q.current===!1&&(j(d("ServerTime").getMillis()),q.current=!0,d("MWCMSelectiveSyncTTRCQPLLoggingUtils").logPoint(o,"selective_sync_remediation_start"),s()));return function(){b!=null&&d("VisibilityAPI").removeVisibiltyChangeListener(b)}},[e,a.parentThreadKey,a.threadKey,a.threadType,p,o,r,s]);return r?k.jsx(c("SelectiveSyncTTRCLogger.react"),{instanceKey:o,isReportThreadViewOpenSprocCalled:q.current,reportThreadViewOpenCalledTimestamp:g,setInstanceKey:f,threadKey:a.threadKey,threadSubtype:a.threadSubtype,threadType:a.threadType}):null}a.displayName=a.name+" [from "+f.id+"]";g["default"]=a}),98);