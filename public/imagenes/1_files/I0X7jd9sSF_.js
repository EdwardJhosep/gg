;/*FB_PKG_DELIM*/

__d("LSGetFirstAvailablePersistentMenuCTAID",[],(function(a,b,c,d,e,f){function a(){var a=arguments,b=a[a.length-1],c=[],d=[];return b.sequence([function(a){return b.sequence([function(a){return b.sortBy(b.db.table(251).fetch(),[["ctaId","DESC"]]).next().then(function(a,d){var e=a.done;a=a.value;return e?c[0]=b.i64.cast([0,1]):(d=a.item,c[0]=b.i64.add(d.ctaId,b.i64.cast([0,1])))})},function(a){return d[0]=c[0]}])},function(a){return b.resolve(d)}])}a.__sproc_name__="LSComposerMenusGetFirstAvailablePersistentMenuCTAIDStoredProcedure";e.exports=a}),null);
__d("LSGetFirstAvailablePersistentMenuItemsCTAID",[],(function(a,b,c,d,e,f){function a(){var a=arguments,b=a[a.length-1],c=[],d=[];return b.sequence([function(a){return b.sequence([function(a){return b.sortBy(b.db.table(77).fetch(),[["ctaId","DESC"]]).next().then(function(a,d){var e=a.done;a=a.value;return e?c[0]=b.i64.cast([0,1]):(d=a.item,c[0]=b.i64.add(d.ctaId,b.i64.cast([0,1])))})},function(a){return d[0]=c[0]}])},function(a){return b.resolve(d)}])}a.__sproc_name__="LSOmnistoreSettingsGetFirstAvailablePersistentMenuItemsCTAIDStoredProcedure";e.exports=a}),null);
__d("LSInsertPersistentMenuCtasForThread",["LSGetFirstAvailablePersistentMenuCTAID"],(function(a,b,c,d,e,f){function a(){var a=arguments,c=a[a.length-1],d=[],e=[];return c.sequence([function(e){return c.sequence([function(a){return c.storedProcedure(b("LSGetFirstAvailablePersistentMenuCTAID")).then(function(a){return a=a,d[0]=a[0],a})},function(b){return c.count(c.db.table(9).fetch([[[a[0]]]])).then(function(a){return d[1]=a})},function(b){return c.i64.eq(d[1],c.i64.cast([0,0]))?c.resolve(0):c.db.table(251).add({threadKey:a[0],ctaId:d[0],title:a[2],actionUrl:a[3],nativeUrl:a[4],ctaType:a[5],platformToken:a[6]})}])},function(a){return c.resolve(e)}])}a.__sproc_name__="LSComposerMenusInsertPersistentMenuCtasForThreadStoredProcedure";e.exports=a}),null);
__d("LSInsertPersistentMenuItemsForThread",["LSGetFirstAvailablePersistentMenuItemsCTAID"],(function(a,b,c,d,e,f){function a(){var a=arguments,c=a[a.length-1],d=[],e=[];return c.sequence([function(e){return c.sequence([function(a){return c.storedProcedure(b("LSGetFirstAvailablePersistentMenuItemsCTAID")).then(function(a){return a=a,d[0]=a[0],a})},function(b){return c.db.table(77).add({threadKey:a[0],ctaId:d[0],title:a[1],actionUrl:a[2],nativeUrl:a[3],ctaType:a[4],platformToken:a[5],enableExtensions:a[6],extensionHeightType:a[7]})}])},function(a){return c.resolve(e)}])}a.__sproc_name__="LSOmnistoreSettingsInsertPersistentMenuItemsForThreadStoredProcedure";e.exports=a}),null);
__d("LSRemoveExistingPersistentMenuCtas",[],(function(a,b,c,d,e,f){function a(){var a=arguments,b=a[a.length-1],c=[];return b.sequence([function(c){return b.forEach(b.db.table(251).fetch([[[a[0]]]]),function(a){return a["delete"]()})},function(a){return b.resolve(c)}])}a.__sproc_name__="LSComposerMenusRemoveExistingPersistentMenuCtasStoredProcedure";e.exports=a}),null);
__d("LSRemoveExistingPersistentMenuItems",[],(function(a,b,c,d,e,f){function a(){var a=arguments,b=a[a.length-1],c=[];return b.sequence([function(c){return b.forEach(b.db.table(77).fetch([[[a[0]]]]),function(a){return a["delete"]()})},function(a){return b.resolve(c)}])}a.__sproc_name__="LSOmnistoreSettingsRemoveExistingPersistentMenuItemsStoredProcedure";e.exports=a}),null);