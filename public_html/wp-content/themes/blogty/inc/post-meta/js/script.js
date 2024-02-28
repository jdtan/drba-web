!(function ($) {
    var blogtyPostMeta = blogtyPostMeta || {};

    blogtyPostMeta.overridePostMeta = function () {
        // Meta Override.
        let isPostMetaOverridden = document.getElementById(
            "blogty-override-post-metas"
        );
        let postMetasWrapperDiv = document.querySelector(
            ".blogty-available-post-metas"
        );
        if (isPostMetaOverridden) {
            isPostMetaOverridden.addEventListener("click", function (event) {
                if (true === event.target.checked) {
                    postMetasWrapperDiv.style.display = "block";
                } else {
                    postMetasWrapperDiv.style.display = "none";
                }
            });
        }
    };

    blogtyPostMeta.tabs = function () {
        // Tabs.
        let postMetaWrapper = document.querySelector(
            ".blogty-meta-options-wrapper"
        );
        if (postMetaWrapper) {
            var tabLinks = document.querySelectorAll(
                ".blogty-meta-tab-header .blogty-tab-title"
            );
            var tabContents = document.querySelectorAll(
                ".blogty-meta-tab-content .blogty-tab-content"
            );

            tabLinks.forEach(function (link) {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    // Remove active class from all tab links
                    tabLinks.forEach(function (tabLink) {
                        tabLink.classList.remove("is-active");
                    });

                    // Add active class to the clicked tab link
                    this.classList.add("is-active");

                    // Hide all tab contents
                    tabContents.forEach(function (content) {
                        content.classList.remove("is-active");
                    });

                    // Show the corresponding tab content
                    var tabId = "blogty-tab-" + this.getAttribute("data-tab");
                    document.getElementById(tabId).classList.add("is-active");
                });
            });
        }
    };

    $(document).ready(function ($) {
        blogtyPostMeta.overridePostMeta();
        blogtyPostMeta.tabs();
    });
})(jQuery);
