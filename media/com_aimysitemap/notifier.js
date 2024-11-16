/*
 * Copyright (c) 2017-2024 Aimy Extensions, Netzum Sorglos Software GmbH
 * Copyright (c) 2016-2017 Aimy Extensions, Lingua-Systems Software GmbH
 *
 * https://www.aimy-extensions.com/
 *
 * License: GNU GPLv2, see LICENSE.txt within distribution and/or
 *          https://www.aimy-extensions.com/software-license.html
 */
var AimySitemapNotifier;AimySitemapNotifier={init:function() {if(!('Notification'in window)) {return false;} if(Notification.permission!=='granted') {Notification.requestPermission();} return(Notification.permission=='granted');},isUsable:function() {if(!('Notification'in window)) {return false;} return(Notification.permission=='granted');},send:function(title,body,icon) {if(!AimySitemapNotifier.isUsable()) {return false;} return new Notification(title,{icon:icon,body:body});}};
