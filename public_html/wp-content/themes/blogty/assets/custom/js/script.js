"use strict";

/*Namespace
------------------------------------------------------- */

var blogty = blogty || {};

/* Handle Accessiblity for Menu Items
 **-----------------------------------------------------*/
blogty.traverseMenu = {
    init: function () {
        let topNavigation = document.querySelector(".blogty-top-nav");
        let primaryNavigation = document.getElementById("site-navigation");

        // For top menu navigation
        if (topNavigation) {
            this.traverse(topNavigation);
        }
        // For primary menu navigation
        if (primaryNavigation) {
            this.traverse(primaryNavigation);
        }
    },

    traverse: function (navigation) {
        let menu = navigation.getElementsByTagName("ul")[0];
        if ("undefined" !== typeof menu) {
            if (!menu.classList.contains("nav-menu")) {
                menu.classList.add("nav-menu");
            }
            // Get all the link elements within the menu.
            let links = menu.getElementsByTagName("a");

            // Get all the link elements with children within the menu.
            let linksWithChildren = menu.querySelectorAll(
                ".menu-item-has-children > a, .page_item_has_children > a"
            );

            // Toggle focus each time a menu link is focused or blurred.
            for (let link of links) {
                link.addEventListener("focus", this.toggleFocus, true);
                link.addEventListener("blur", this.toggleFocus, true);
            }

            // Toggle focus each time a menu link with children receive a touch event.
            for (let link of linksWithChildren) {
                link.addEventListener("touchstart", this.toggleFocus, false);
            }
        }
    },

    toggleFocus: function (event) {
        if (event.type === "focus" || event.type === "blur") {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains("nav-menu")) {
                // On li elements toggle the class .focus.
                if ("li" === self.tagName.toLowerCase()) {
                    self.classList.toggle("focus");
                }
                self = self.parentNode;
            }
        }

        if (event.type === "touchstart") {
            let menuItem = this.parentNode;
            event.preventDefault();
            for (let link of menuItem.parentNode.children) {
                if (menuItem !== link) {
                    link.classList.remove("focus");
                }
            }
            menuItem.classList.toggle("focus");
        }
    },
};

/* Handle Focus for Dialog Accessiblity
 **-----------------------------------------------------*/
blogty.handleFocus = {
    init: function () {
        this.keepFocusInModal();
    },

    keepFocusInModal: function () {
        let modal = document.querySelectorAll(".blogty-canvas-modal");

        document.addEventListener("keydown", function (event) {
            // Check for if tab key is pressed
            let KEYCODE_TAB = 9;
            let isTabPressed =
                event.key === "Tab" || event.keyCode === KEYCODE_TAB;
            if (!isTabPressed) {
                return;
            }

            if (modal) {
                modal.forEach(function (element) {
                    let focusableEls = element.querySelectorAll(
                        'a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="search"]:not([disabled]), input[type="submit"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])'
                    );

                    let firstFocusableEl = focusableEls[0];
                    let lastFocusableEl = focusableEls[focusableEls.length - 1];

                    // if shift key pressed for shift + tab combination
                    if (event.shiftKey) {
                        if (document.activeElement === firstFocusableEl) {
                            lastFocusableEl.focus(); // add focus for the last focusable element
                            event.preventDefault();
                        }
                    } else {
                        // if tab key is pressed
                        if (document.activeElement === lastFocusableEl) {
                            // if focused has reached to last focusable element then focus first focusable element after pressing tab
                            firstFocusableEl.focus(); // add focus for the first focusable element
                            event.preventDefault();
                        }
                    }
                });
            }
        });
    },
};

/* Preloader
 **-----------------------------------------------------*/
blogty.fadeOutPreloader = {
    init: function () {
        let preloader = document.querySelector("#blogty-preloader-wrapper");
        if (preloader) {
            preloader.classList.add("fadeOut");
            setTimeout(function () {
                preloader.style.display = "none";
            }, 1000);
        }
    },
};

/* Scroll to top
 **-----------------------------------------------------*/
blogty.scrollToTop = {
    init: function () {
        let rootElement = document.documentElement;
        let _this = this;

        // Scroll to top on click
        let scrollToTopBtn = document.querySelectorAll(
            ".blogty-toggle-scroll-top"
        );
        if (scrollToTopBtn) {
            scrollToTopBtn.forEach(function (item) {
                _this.goToTop(item, rootElement);
            });
        }

        // Display Floating Button
        let floatingScrollTopBtn = document.querySelectorAll(
            ".blogty-floating-scroll-top"
        );
        if (floatingScrollTopBtn) {
            floatingScrollTopBtn.forEach(function (item) {
                _this.scrollToTopPosition(item, rootElement);
            });
        }
    },

    goToTop: function (scrollToTopBtn, rootElement) {
        scrollToTopBtn.addEventListener("click", function (elem) {
            elem.preventDefault();
            rootElement.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    },

    scrollToTopPosition: function (scrollToTopBtn, rootElement) {
        window.addEventListener("scroll", function (event) {
            let scrollTotal =
                rootElement.scrollHeight - rootElement.clientHeight;
            // Show on certain window height
            if (rootElement.scrollTop / scrollTotal > 0.4) {
                scrollToTopBtn.classList.add("visible");
            } else {
                scrollToTopBtn.classList.remove("visible");
            }
        });
    },
};

/* Sticky Menu
 **-----------------------------------------------------*/
blogty.stickyMenu = {
    init: function () {
        const stickyElement = document.querySelector(
            ".blogty-primary-bar-row.sticky-menu"
        );
        if (stickyElement) {
            let stickyPoint = stickyElement.offsetTop;
            stickyElement.style.height = "auto";
            let menuHeight = stickyElement.getBoundingClientRect().height;
            if (menuHeight > 1) {
                stickyElement.style.height =
                    (menuHeight + 0.1).toFixed(2) + "px";
            } else {
                stickyElement.style.height = "auto";
            }
            window.addEventListener("resize", function (event) {
                stickyPoint = stickyElement.offsetTop;
                stickyElement.style.height = "auto";
                let menuHeight = stickyElement.getBoundingClientRect().height;
                if (menuHeight > 1) {
                    stickyElement.style.height =
                        (menuHeight + 0.1).toFixed(2) + "px";
                } else {
                    stickyElement.style.height = "auto";
                }
            });

            window.addEventListener("scroll", function (event) {
                if (window.pageYOffset > stickyPoint) {
                    stickyElement.classList.add("has-menu-sticked");
                } else {
                    stickyElement.classList.remove("has-menu-sticked");
                }
            });
        }
    },
};

/* Sub Menu Toggles
 **-----------------------------------------------------*/
blogty.subMenuToggle = {
    init: function () {
        const toggleItems = document.querySelectorAll(".sub-menu-toggle");
        if (toggleItems) {
            toggleItems.forEach(function (item) {
                item.addEventListener("click", function (e) {
                    e.preventDefault();
                    this.classList.toggle("active");
                    this.setAttribute(
                        "aria-selected",
                        `${!(this.getAttribute("aria-selected") === "true")}`
                    );
                    let currentClass = this.getAttribute("data-toggle-target");
                    if (currentClass) {
                        document
                            .querySelector(currentClass)
                            .classList.toggle("active");
                    }
                });
            });
        }
    },
};

/* Canvas Modal
 **-----------------------------------------------------*/
blogty.CanvasModal = {
    init: function () {
        if (document.querySelector(".toggle-canvas-modal")) {
            // Handle canvas modal when opened
            this.onOpen();
            // Handle canvas modal when closed
            this.onClose();
            // When open, close if visitor clicks on the wrapping element of the modal.
            this.outsideModal();
            // Close on escape key press.
            this.closeOnEscape();
        }
    },

    onOpen: function () {
        document
            .querySelectorAll(".toggle-canvas-modal")
            .forEach(function (element) {
                element.addEventListener("click", function (event) {
                    event.preventDefault();
                    document.body.classList.add("canvas-modal-is-open");
                    document.body.classList.add(
                        this.getAttribute("data-body-class")
                    );
                    element.classList.add("active");
                    element.setAttribute("aria-expanded", true);
                    let focusElement = this.getAttribute("data-focus");
                    if (focusElement) {
                        setTimeout(function () {
                            document.querySelector(focusElement).focus();
                        }, 500);
                    }
                });
            });
    },

    onClose: function () {
        document.querySelectorAll(".close-canvas-modal").forEach(
            function (element) {
                element.addEventListener(
                    "click",
                    function (event) {
                        event.preventDefault();
                        this.hideModal();
                    }.bind(this)
                );
            }.bind(this)
        );
    },

    outsideModal: function () {
        document.addEventListener(
            "click",
            function (event) {
                if (document.body.classList.contains("canvas-modal-is-open")) {
                    let overlayDiv = document.querySelector("#page.site");
                    if (event.target == overlayDiv) {
                        this.hideModal();
                    }
                }
            }.bind(this)
        );
    },

    closeOnEscape: function () {
        document.addEventListener(
            "keydown",
            function (event) {
                if (event.key === "Escape") {
                    event.preventDefault();
                    this.hideModal();
                }
            }.bind(this)
        );
    },

    hideModal: function () {
        document.body.classList.remove("canvas-modal-is-open");
        let activeItem = document.querySelector(".toggle-canvas-modal.active");
        if (activeItem) {
            document.body.classList.remove(
                activeItem.getAttribute("data-body-class")
            );
            let focusElement = activeItem.getAttribute("data-focus");
            if (focusElement) {
                document.querySelector(focusElement).blur();
            }
            activeItem.setAttribute("aria-expanded", false);
            activeItem.focus();
            activeItem.classList.remove("active");
        }
    },
};

/* Search Toggle
 **-----------------------------------------------------*/
blogty.SearchBlock = {
    isToggled: false,

    init: function () {
        if (document.querySelector(".toggle-search-block")) {
            this.toggleSearchBlock();
            this.closeOnEscape();
        }
    },

    toggleSearchBlock: function () {
        const self = this;
        document
            .querySelectorAll(".toggle-search-block")
            .forEach(function (element) {
                element.addEventListener("click", function (event) {
                    event.preventDefault();
                    self.isToggled = !self.isToggled;
                    if (self.isToggled) {
                        document.body.classList.add("search-block-is-open");
                        document.body.classList.add(
                            this.getAttribute("data-body-class")
                        );
                        element.classList.add("active");
                        element.parentNode.classList.add("active");
                        element.setAttribute("aria-expanded", true);
                        let focusElement = this.getAttribute("data-focus");
                        if (focusElement) {
                            setTimeout(function () {
                                element.parentNode
                                    .querySelector(focusElement)
                                    .focus();
                            }, 500);
                        }
                        setTimeout(function () {
                            self.outsideBlock();
                        }, 100);
                    } else {
                        self.hideBlock();
                    }
                });
            });
    },

    closeOnEscape: function () {
        const self = this;
        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                event.preventDefault();
                self.hideBlock();
            }
        });
    },

    outsideBlock: function () {
        const self = this;
        document.addEventListener("click", self.handleClickOutsideBox);
    },

    handleClickOutsideBox: function (event) {
        const self = this;
        if (document.body.classList.contains("search-block-is-open")) {
            let targetDiv = document.querySelector(
                ".blogty-search-toggle.active .em-search-form-inner"
            );
            if (!targetDiv.contains(event.target)) {
                blogty.SearchBlock.hideBlock();
            }
        }
    },

    hideBlock: function () {
        const self = this;
        document.body.classList.remove("search-block-is-open");
        let activeItem = document.querySelector(".toggle-search-block.active");
        if (activeItem) {
            document.body.classList.remove(
                activeItem.getAttribute("data-body-class")
            );
            let focusElement = activeItem.getAttribute("data-focus");
            if (focusElement) {
                activeItem.parentNode.querySelector(focusElement).blur();
            }
            activeItem.setAttribute("aria-expanded", false);
            activeItem.focus();
            activeItem.classList.remove("active");
            activeItem.parentNode.classList.remove("active");
            document.removeEventListener("click", self.handleClickOutsideBox);
            self.isToggled = false;
        }
    },
};

/* Background Image
 **-----------------------------------------------------*/
blogty.setBackgroundImage = {
    init: function () {
        let bgImageContainer = document.querySelectorAll(".blogty-bg-image");
        if (bgImageContainer) {
            bgImageContainer.forEach(function (item) {
                let image = item.querySelector("img");
                if (image) {
                    let imageSrc = image.getAttribute("src");
                    if (imageSrc) {
                        item.style.backgroundImage = "url(" + imageSrc + ")";
                        image.style.display = "none";
                    }
                }
            });
        }
    },
};

/* Progress Bar
 **-----------------------------------------------------*/
blogty.progressBar = {
    init: function () {
        let progressBarDiv = document.getElementById("blogty-progress-bar");

        if (progressBarDiv) {
            let body = document.body;
            let rootElement = document.documentElement;

            window.addEventListener("scroll", function (event) {
                let winScroll = body.scrollTop || rootElement.scrollTop;
                let height =
                    rootElement.scrollHeight - rootElement.clientHeight;
                let scrolled = (winScroll / height) * 100;
                progressBarDiv.style.width = scrolled + "%";
            });
        }
    },
};

/* Slider
 **-----------------------------------------------------*/
blogty.slider = {
    init: function () {
        this.bannerSlider();
        this.widgetSlider();
    },
    bannerSlider: function () {
        let sliderWrapper = document.querySelector(".blogty-banner-wrapper");
        if (sliderWrapper) {
            let bannerDefaultOptions = {
                loop: true,
            };

            let bannerDataOptions;

            // Setup Banner.
            let bannerData = sliderWrapper.getAttribute("data-banner") || {};
            if (bannerData) {
                bannerDataOptions = JSON.parse(bannerData);
            }
            let sliderOptions = {
                ...bannerDefaultOptions,
                ...bannerDataOptions,
            };
            let swiper = new Swiper(sliderWrapper, sliderOptions);
        }
    },
    widgetSlider: function () {
        let sliderWrapper = document.querySelectorAll(
            ".blogty-slider-wrapper-block .swiper"
        );
        if (sliderWrapper) {
            sliderWrapper.forEach(function (item) {
                let parentWrapper = item.parentNode;
                let navNext = parentWrapper.querySelector(
                    ".swiper-button-next"
                );
                let navPrev = parentWrapper.querySelector(
                    ".swiper-button-prev"
                );
                let paginate =
                    parentWrapper.querySelector(".swiper-pagination");
                let defaultOptions = {
                    slidesPerView: 1,
                    lazyloading: true,
                    navigation: {
                        nextEl: navNext,
                        prevEl: navPrev,
                    },
                    pagination: {
                        el: paginate,
                        clickable: true,
                    },
                };
                let data = item.getAttribute("data-slider") || {};
                if (data) {
                    var dataOptions = JSON.parse(data);
                }
                let sliderOptions = {
                    ...defaultOptions,
                    ...dataOptions,
                };
                let swiper = new Swiper(item, sliderOptions);

                let containerWidth = item.clientWidth;
                if (containerWidth < 500) {
                    swiper.params.slidesPerView = 1;
                    swiper.update();
                }
            });
        }
    },
};

/* Tabs
 **-----------------------------------------------------*/
blogty.tabs = {
    init: function () {
        let tabLinks = document.querySelectorAll("[data-toggle='uf-tab']");
        if (tabLinks) {
            tabLinks.forEach(function (tabLink) {
                tabLink.addEventListener("click", function (e) {
                    e.preventDefault();
                    let tabHeadings = [...tabLink.parentNode.children];
                    let tabContents = [
                        ...tabLink.parentNode.nextElementSibling.children,
                    ];
                    tabHeadings.forEach((tabLink) => {
                        tabLink.classList.remove("active");
                        tabLink.setAttribute("aria-selected", "false");
                    });
                    tabContents.forEach((tabContent) => {
                        tabContent.classList.remove("active");
                    });
                    let selectedTabId = tabLink.getAttribute("aria-controls");
                    let selectedContentTab =
                        document.getElementById(selectedTabId);
                    tabLink.classList.add("active");
                    tabLink.setAttribute("aria-selected", "true");
                    selectedContentTab.classList.add("active");
                });
            });
        }
    },
};

/* Load functions at proper events
 *--------------------------------------------------*/
/**
 * Is the DOM ready?
 *
 * This implementation is coming from https://gomakethings.com/a-native-javascript-equivalent-of-jquerys-ready-method/
 *
 * @param {Function} fn Callback function to run.
 */
function blogtyDomReady(fn) {
    if (typeof fn !== "function") {
        return;
    }

    if (
        document.readyState === "interactive" ||
        document.readyState === "complete"
    ) {
        return fn();
    }

    document.addEventListener("DOMContentLoaded", fn, false);
}

blogtyDomReady(function () {
    blogty.stickyMenu.init();
    blogty.subMenuToggle.init();
    blogty.traverseMenu.init();
    blogty.handleFocus.init();
    blogty.CanvasModal.init();
    blogty.SearchBlock.init();
    blogty.scrollToTop.init();
    blogty.setBackgroundImage.init();
    blogty.progressBar.init();
    blogty.slider.init();
    blogty.tabs.init();
});

window.addEventListener("load", function (event) {
    blogty.fadeOutPreloader.init();
});

// For jQuery based functionalities
!(function ($) {
    var blogty = blogty || {};

    let currentPage, nextPage, maxPage, loadType, template;

    let loadButtonWrapper = $(".blogty-load-posts-btn-wrapper");
    let loadButton = $(".blogty-ajax-load-btn");
    let loader = $(".blogty-ajax-loader");

    if (loadButtonWrapper.length > 0) {
        currentPage = parseInt(loadButtonWrapper.attr("data-page"));
        nextPage = currentPage + 1;
        maxPage = parseInt(loadButtonWrapper.attr("data-max-pages"));
        loadType = loadButtonWrapper.attr("data-load-type");
        template = loadButtonWrapper.closest("#primary").attr("data-template");
    }

    let canBeLoaded = true;

    blogty.loadMorePosts = {
        fetchPostsOnClick: function () {
            loadButton.on("click", function (event) {
                event.preventDefault();
                if (canBeLoaded) {
                    fetchThePosts();
                }
            });
        },
        fetchPostsOnScroll: function () {
            let offset = loadButtonWrapper.offset().top - $(window).scrollTop();
            if (nextPage <= maxPage) {
                if (700 > offset && canBeLoaded) {
                    fetchThePosts();
                }
            }
        },
    };

    function fetchThePosts() {
        $.ajax({
            type: "POST",
            url: BlogtyVars.ajaxurl,
            data: {
                action: "blogty_load_posts",
                load_post_nonce: BlogtyVars.load_post_nonce,
                query_vars: BlogtyVars.query_vars,
                page: nextPage,
                template: template,
            },
            dataType: "json",
            beforeSend: function () {
                loadButton.addClass("loading-posts");
                loader.addClass("active");
                canBeLoaded = false;
            },
            success: function (response) {
                if (response.success) {
                    let contentJoin = response.data.content.join("");
                    let content = $(contentJoin);
                    content.hide();

                    $(".blogty-posts-lists").append(content);
                    // Set Background Image if any
                    if (contentJoin.indexOf("blogty-bg-image") >= 0) {
                        blogty.setBackgroundImage.init();
                    }
                    content.fadeIn();

                    currentPage = nextPage;
                    nextPage++;

                    if (nextPage <= maxPage) {
                        if ("button_click_load" == loadType) {
                            setTimeout(function () {
                                loader.removeClass("active");
                                loadButton.removeClass("loading-posts");
                            }, 500);
                        }
                    } else {
                        loadButton.fadeOut();
                    }

                    canBeLoaded = true;

                    $(document.body).trigger("posts-loaded");
                } else {
                    loader.removeClass("active");
                }
            },
        });
    }

    $(document).ready(function () {
        // Ajax load posts.
        if (loadButtonWrapper.length > 0) {
            // Load Posts on Click.
            if ("button_click_load" == loadType) {
                blogty.loadMorePosts.fetchPostsOnClick();
            }
            // Load Posts on Scroll.
            if ("infinite_scroll_load" == loadType) {
                $(window).scroll(function () {
                    blogty.loadMorePosts.fetchPostsOnScroll();
                });
            }
        }
    });
})(jQuery);
