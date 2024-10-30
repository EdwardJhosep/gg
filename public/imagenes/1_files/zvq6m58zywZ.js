;/*FB_PKG_DELIM*/

__d("LSInsertAnonymousTaskContext",[],(function(a,b,c,d,e,f){function a(){var a=arguments,b=a[a.length-1],c=[];return b.sequence([function(c){return b.db.table(311).add({taskId:a[0],projectName:a[1]})},function(a){return b.resolve(c)}])}a.__sproc_name__="LSAnonymousCredentialsInsertAnonymousTaskContextStoredProcedure";e.exports=a}),null);
__d("LSIssueNewTaskUsingSyncChannel",["LSIssueNewTaskAndGetTaskID"],(function(a,b,c,d,e,f){function a(){var a=arguments,c=a[a.length-1],d=[],e=[];return c.sequence([function(f){return c.sequence([function(e){return c.storedProcedure(b("LSIssueNewTaskAndGetTaskID"),a[0],a[1],a[2],a[3],a[4],a[5],a[6],a[7],a[8],a[9],a[12]).then(function(a){return a=a,d[0]=a[0],a})},function(b){return c.db.table(306).add({taskId:d[0],syncChannel:a[10],requiresAuthentication:a[11]})},function(a){return e[0]=d[0]}])},function(a){return c.resolve(e)}])}a.__sproc_name__="LSCoreIssueNewTaskUsingSyncChannelStoredProcedure";e.exports=a}),null);
__d("LSDispatchMediaReceiverFetchForWeb",["LSInsertAnonymousTaskContext","LSIssueNewTaskUsingSyncChannel","LSMailboxTaskCompletionApiOnTaskInsertion"],(function(a,b,c,d,e,f){function a(){var a=arguments,c=a[a.length-1],d=[],e=[];return c.sequence([function(e){return c.sequence([function(e){return d[0]=new c.Map(),d[0].set("thread_key",a[0]),d[0].set("message_id",a[1]),d[0].set("receiver_fetch_id",a[2]),d[1]=d[0].get("message_id"),d[0],d[4]=["LSMediaReceiverFetchTransportAnonymizedMsgrWebE2EEMediaReceiverFetchSyncAction",".",d[1]].join(""),d[2]=c.toJSON(d[0]),c.storedProcedure(b("LSIssueNewTaskUsingSyncChannel"),d[4],c.i64.cast([0,1018]),d[2],void 0,void 0,c.i64.cast([0,0]),c.i64.cast([0,0]),void 0,void 0,c.i64.cast([0,0]),c.i64.cast([0,2]),!1,c.i64.cast([0,0])).then(function(a){return a=a,d[3]=a[0],a})},function(a){return c.storedProcedure(b("LSMailboxTaskCompletionApiOnTaskInsertion"),d[3])},function(a){return c.storedProcedure(b("LSInsertAnonymousTaskContext"),d[3],"LS_MediaReceiverFetch")}])},function(a){return c.resolve(e)}])}a.__sproc_name__="LSMediaReceiverFetchTransportDispatchMediaReceiverFetchForWebStoredProcedure";e.exports=a}),null);
__d("LSDispatchMediaReceiverFetchForWebStoredProcedure",["LSDispatchMediaReceiverFetchForWeb","cr:8709"],(function(a,b,c,d,e,f,g){function a(a,b){return c("LSDispatchMediaReceiverFetchForWeb")(b.threadKey,b.messageId,b.receiverFetchId,a)}g["default"]=a}),98);
__d("MAWMediaReceiverFetchDoneCallbackMap",[],(function(a,b,c,d,e,f){"use strict";a=new Map();b=a;f["default"]=b}),66);
__d("MAWIssueReceiverFetchTask",["LSDispatchMediaReceiverFetchForWebStoredProcedure","LSFactory","MAWGetIsMediaDownloadStatusEnabled","MAWMediaDownloadStatus","MAWMediaReceiverFetchDoneCallbackMap","WAHashUtils"],(function(a,b,c,d,e,f,g){"use strict";function a(a,b,e,g,h){d("MAWGetIsMediaDownloadStatusEnabled").getIsMediaDownloadStatusEnabled()&&(h==null?void 0:h({tag:"UpdateMediaStatus",value:{details:"issue_receiver_fetch_task",key:d("WAHashUtils").stringToPlaintextHash(b),status:c("MAWMediaDownloadStatus").DOWNLOADING,type:"main"}}),c("MAWMediaReceiverFetchDoneCallbackMap").set(b,function(a){h==null?void 0:h({tag:"UpdateMediaStatus",value:{details:"issue_receiver_fetch_task_callback",key:d("WAHashUtils").stringToPlaintextHash(b),status:a==="success"?c("MAWMediaDownloadStatus").SUCCESS:c("MAWMediaDownloadStatus").MANUAL_RETRYABLE_FAILURE,type:"main"}})}));return a.runInTransaction(function(a){return c("LSDispatchMediaReceiverFetchForWebStoredProcedure")(c("LSFactory")(a),{messageId:b,receiverFetchId:e,threadKey:g})},"readwrite",void 0,void 0,f.id+":57")}g.issueReceiverFetchTask=a}),98);
__d("MWRestoreMessagesFromEB",["I64","LSAppendDataTraceAddonStoredProcedure","LSDataTraceCheckPoint","LSDataTraceType","LSEncryptedBackupsBackupTenancy","LSEncryptedBackupsMessagesRangeQueryDirection","LSFactory","LSIntEnum","LSIssueMessageRangeQueryTaskStoredProcedure","LSMEBTaskCreationSource","MAWAsyncEBPendingQueryPromise","MAWEBRestoreTrackingUtils","MAWEncryptedBackupUtils","MAWEncryptedBackupsRestoreMessageOverGraphQL","MAWMainTraceUtils","MWEncryptedBackUpEBNotEnabledError","Promise","WAJids","WATagsLogger","asyncToGeneratorRuntime","err","gkx","promiseDone","qex"],(function(a,b,c,d,e,f,g){"use strict";var h,i,j;function k(){var a=babelHelpers.taggedTemplateLiteralLoose(["[labyrinth_web][","] Issuing message range query for thread: "," startSortKey: "," numMessages: ","} "]);k=function(){return a};return a}function l(){var a=babelHelpers.taggedTemplateLiteralLoose(["[labyrinth_web] Issuing message range query for chatJid: "," skipped. EB not enabled"]);l=function(){return a};return a}function a(a){var e=a.chatJid,f=a.newerNumMessages,g=a.numMessages,k=a.passedTraceId,n=a.sortOrderMs,o=a.source,p=a.storage;if(!c("gkx")("23914"))return null;var q=k!=null?k:d("MAWMainTraceUtils").createTraceId();c("promiseDone")(d("MAWEncryptedBackupUtils").getBackupTenancy(p.tables).then(function(a){if(a!=null&&(i||(i=d("I64"))).equal(a,(j||(j=d("LSIntEnum"))).ofNumber(c("LSEncryptedBackupsBackupTenancy").PRODUCTION)))return c("qex")._("1776")===!0||c("gkx")("5976")?d("MAWEncryptedBackupsRestoreMessageOverGraphQL").getMessagesFromBackup(e,p,n,(i||(i=d("I64"))).to_float(f)>0?c("LSEncryptedBackupsMessagesRangeQueryDirection").AFTER:c("LSEncryptedBackupsMessagesRangeQueryDirection").BEFORE,q,o):m({chatJid:e,newerNumMessages:f,numMessages:g,passedTraceId:k,sortOrderMs:n,source:o,storage:p,traceId:q});else{d("WATagsLogger").TAGS(["labyrinth_web","eb_restore"]).WARN(l(),e);d("MAWAsyncEBPendingQueryPromise").rejectPendingQueryIfPresent(q,c("err")(d("MWEncryptedBackUpEBNotEnabledError").EB_NOT_ENABLED));return(h||(h=b("Promise"))).resolve()}}));return q}function m(a){var e=a.chatJid,g=a.newerNumMessages,h=a.numMessages,l=a.passedTraceId,m=a.sortOrderMs,n=a.source,o=a.storage,p=a.traceId;return o.runInTransaction(function(){var a=b("asyncToGeneratorRuntime").asyncToGenerator(function*(a){yield d("MAWMainTraceUtils").startTraceWithTxn(a,(i||(i=d("I64"))).of_float(Date.now()),p,(j||(j=d("LSIntEnum"))).ofNumber(c("LSDataTraceType").ENCRYPTED_BACKUPS_RESTORE));yield c("LSAppendDataTraceAddonStoredProcedure")(c("LSFactory")(a),{checkPointId:j.ofNumber(c("LSDataTraceCheckPoint").LABYRINTH_WEB_ISSUE_MESSAGE_RANGE_QUERY),dataTraceId:p,syncChannel:i.neg_one});d("WATagsLogger").TAGS(["labyrinth_web","eb_restore",p]).LOG(k(),p,e,i.to_string(m),i.to_string(h));d("MAWEBRestoreTrackingUtils").markEBRestorePaginated(n,l,"LS");return c("LSIssueMessageRangeQueryTaskStoredProcedure")(c("LSFactory")(a),{includeOffset:c("gkx")("5340"),isPointQuery:!1,newerNumMessages:g,numMessages:h,source:j.ofNumber((a=n)!=null?a:c("LSMEBTaskCreationSource").UNKNOWN),startSortKey:i.to_string(m),threadId:d("WAJids").threadIdForChatJid(e),traceId:p})});return function(b){return a.apply(this,arguments)}}(),"readwrite",void 0,void 0,f.id+":128")}g["default"]=a}),98);