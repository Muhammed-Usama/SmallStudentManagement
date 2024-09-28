// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.6.0/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.6.0/firebase-messaging.js");

// notification click opens by default
//  but it will open in new tab if no any other tab have already opened the website morungexpress.com

//Code for adding event on click of notification
//in service woker
self.addEventListener("notificationclick", (event) => {
    event.waitUntil(
        (async function () {
            const allClients = await clients.matchAll({
                includeUncontrolled: true,
            });
            let chatClient;
            for (const client of allClients) {
                if (
                    client.indexOf(
                        event.notification.data.FCM_MSG.notification
                            .click_action
                    ) >= 0
                ) {
                    client.focus();
                    chatClient = client;
                    break;
                }
            }
            if (!chatClient) {
                chatClient = await clients.openWindow(
                    event.notification.data.FCM_MSG.notification.click_action
                );
            }
        })()
    );
});

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyB_shjsip8F0SURJDD3VtY3awcV_RDEOGI",
    authDomain: "send-notification-1c643.firebaseapp.com",
    projectId: "send-notification-1c643",
    storageBucket: "send-notification-1c643.appspot.com",
    messagingSenderId: "591484419480",
    appId: "1:591484419480:web:eaa091930e27e176993fed",
    measurementId: "G-YJH08YDCKF",
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);

    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };

    return self.registration.showNotification(title, options);
});

messaging.onBackgroundMessage(function (payload) {
    console.log(" Received background message ", payload);
});
