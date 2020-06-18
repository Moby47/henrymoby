var staticCacheName = "pwa-p" + new Date().getTime();
var filesToCache = [
    '/',

    '/offline',

    '/css/style.css',
    '/css/blog.css',
    '/css/font-awesome.min.css',
    '/css/bootstrap.min.css',
    '/css/wicked.min.css',
    '/css/contact.css',
    '/css/single.css',
    
    'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
    'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons',
    "https://unpkg.com/nprogress@0.2.0/nprogress.css",
    "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css",

    '/images/icons/icon-48x48.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-256x256.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
    '/images/pic.jpg',
    '/images/ab.jpg',
    '/images/banner.jpg',
    '/images/black-spinner.gif',
    '/images/exp.jpg',
    '/images/edu.jpg',
    '/images/splash.gif',

    "https://code.jquery.com/jquery-3.3.1.slim.min.js",
    "/js/bootstrap.min.js",
    '/js/app.js',
    '/js/wow.min.js',
    '/js/promise.min.js',
    "https://unpkg.com/nprogress@0.2.0/nprogress.js",
    "https://cdn.jsdelivr.net/npm/vue-disqus@3/dist/vue-disqus.js",
    "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js",
    "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js",
    "https://unpkg.com/portal-vue",
    
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});