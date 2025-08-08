/**
 * Range Two Price
 * Filter Products
 * Filter Sort
 * Switch Layout
 * Handle Sidebar Filter
 * Handle Dropdown Filter
 */
(function ($) {
    "use strict";

    /* Range Two Price
  -------------------------------------------------------------------------------------*/
    var rangeTwoPrice = function () {
        if ($("#price-value-range").length > 0) {
            let skipSlider = document.getElementById("price-value-range");
            let skipValues = [
                document.getElementById("price-min-value"),
                document.getElementById("price-max-value"),
            ];

            let min = parseInt(skipSlider.getAttribute("data-min"));
            let max = parseInt(skipSlider.getAttribute("data-max"));

            // to avoid casuing error because slider does not accept same min,max values
            if (min == max) {
                min -= 1;
            }

            noUiSlider.create(skipSlider, {
                start: [min, max],
                connect: true,
                step: 1,
                range: {
                    min: min,
                    max: max,
                },
                format: {
                    from: function (value) {
                        return parseInt(value);
                    },
                    to: function (value) {
                        return parseInt(value);
                    },
                },
            });

            skipSlider.noUiSlider.on("update", function (val, e) {
                skipValues[e].innerText = val[e];
            });
        }
    };

    /* Range Two Width
  -------------------------------------------------------------------------------------*/
    var rangeTwoWidth = function () {
        if ($("#width-value-range").length > 0) {
            let skipSlider = document.getElementById("width-value-range");
            let skipValues = [
                document.getElementById("width-min-value"),
                document.getElementById("width-max-value"),
            ];

            let min = parseInt(
                isNaN(Number(skipSlider.getAttribute("data-min")))
                    ? 0
                    : Number(skipSlider.getAttribute("data-min"))
            );
            let max = parseInt(
                isNaN(Number(skipSlider.getAttribute("data-max")))
                    ? 1
                    : Number(skipSlider.getAttribute("data-max"))
            );

            // to avoid casuing error because slider does not accept same min,max values
            if (min == max) {
                min -= 1;
            }

            noUiSlider.create(skipSlider, {
                start: [min, max],
                connect: true,
                step: 1,
                range: {
                    min: min,
                    max: max,
                },
                format: {
                    from: function (value) {
                        return parseInt(value);
                    },
                    to: function (value) {
                        return parseInt(value);
                    },
                },
            });

            skipSlider.noUiSlider.on("update", function (val, e) {
                skipValues[e].innerText = val[e];
            });
        }
    };

    /* Range Two Length
  -------------------------------------------------------------------------------------*/
    var rangeTwoLength = function () {
        if ($("#length-value-range").length > 0) {
            let skipSlider = document.getElementById("length-value-range");
            let skipValues = [
                document.getElementById("length-min-value"),
                document.getElementById("length-max-value"),
            ];

            let min = parseInt(
                isNaN(Number(skipSlider.getAttribute("data-min")))
                    ? 0
                    : Number(skipSlider.getAttribute("data-min"))
            );
            let max = parseInt(
                isNaN(Number(skipSlider.getAttribute("data-max")))
                    ? 1
                    : Number(skipSlider.getAttribute("data-max"))
            );

            // to avoid casuing error because slider does not accept same min,max values
            if (min == max) {
                min -= 1;
            }

            noUiSlider.create(skipSlider, {
                start: [min, max],
                connect: true,
                step: 1,
                range: {
                    min: min,
                    max: max,
                },
                format: {
                    from: function (value) {
                        return parseInt(value);
                    },
                    to: function (value) {
                        return parseInt(value);
                    },
                },
            });

            skipSlider.noUiSlider.on("update", function (val, e) {
                skipValues[e].innerText = val[e];
            });
        }
    };

    /* Filter Products
  -------------------------------------------------------------------------------------*/
    var filterProducts = function () {
        const priceSlider = document.getElementById("price-value-range");
        const widthSlider = document.getElementById("width-value-range");
        const lengthSlider = document.getElementById("length-value-range");

        const minPrice = parseInt(priceSlider.dataset.min);
        const maxPrice = parseInt(priceSlider.dataset.max);
        const minWidth = parseInt(widthSlider.dataset.min);
        const maxWidth = parseInt(widthSlider.dataset.max);
        const minLength = parseInt(lengthSlider.dataset.min);
        const maxLength = parseInt(lengthSlider.dataset.max);

        const filters = {
            minPrice: minPrice,
            maxPrice: maxPrice,
            minCapacity: 0,
            maxCapacity: 0,
            minWidth: minWidth,
            maxWidth: maxWidth,
            minLength: minLength,
            maxLength: maxLength,
        };

        priceSlider.noUiSlider.on("update", function (values) {
            filters.minPrice = parseInt(values[0]);
            filters.maxPrice = parseInt(values[1]);

            $("#price-min-value").text(filters.minPrice);
            $("#price-max-value").text(filters.maxPrice);

            applyFilters();
            updateMetaFilter();
        });

        widthSlider.noUiSlider.on("update", function (values) {
            filters.minWidth = parseInt(values[0]);
            filters.maxWidth = parseInt(values[1]);

            $("#width-min-value").text(filters.minWidth);
            $("#width-max-value").text(filters.maxWidth);

            applyFilters();
            updateMetaFilter();
        });

        lengthSlider.noUiSlider.on("update", function (values) {
            filters.minLength = parseInt(values[0]);
            filters.maxLength = parseInt(values[1]);

            $("#length-min-value").text(filters.minLength);
            $("#length-max-value").text(filters.maxLength);

            applyFilters();
            updateMetaFilter();
        });

        $(".capacity").on("click", function () {
            const capacity = $(this).data("capacity").split("-");
            filters.minCapacity = parseInt(capacity[0]);
            filters.maxCapacity = parseInt(capacity[1]);

            applyFilters();
            updateMetaFilter();
        });

        function updateMetaFilter() {
            const appliedFilters = $("#applied-filters");
            const metaFilterShop = $(".meta-filter-shop");
            appliedFilters.empty();

            if (filters.minPrice > minPrice || filters.maxPrice < maxPrice) {
                appliedFilters.append(
                    `<span class="filter-tag">$${filters.minPrice} - $${filters.maxPrice} <span class="remove-tag icon-close" data-filter="price"></span></span>`
                );
            }

            if (filters.minCapacity > 0) {
                appliedFilters.append(
                    `<span class="filter-tag">${filters.minCapacity}${
                        Number.isNaN(filters.maxCapacity)
                            ? "+"
                            : "-" + filters.maxCapacity
                    } Kids <span class="remove-tag icon-close" data-filter="capacity"></span></span>`
                );
            }

            if (filters.minWidth > minWidth || filters.maxWidth < maxWidth) {
                appliedFilters.append(
                    `<span class="filter-tag">${filters.minWidth}' - ${filters.maxWidth}' <span class="remove-tag icon-close" data-filter="width"></span></span>`
                );
            }

            if (
                filters.minLength > minLength ||
                filters.maxLength < maxLength
            ) {
                appliedFilters.append(
                    `<span class="filter-tag">${filters.minLength}' - ${filters.maxLength}' <span class="remove-tag icon-close" data-filter="length"></span></span>`
                );
            }

            const hasFiltersApplied = appliedFilters.children().length > 0;

            metaFilterShop.toggle(hasFiltersApplied);

            $("#remove-all").toggle(hasFiltersApplied);
        }

        $("#applied-filters").on("click", ".remove-tag", function () {
            const filterType = $(this).data("filter");
            if (filterType === "price") {
                filters.minPrice = minPrice;
                filters.maxPrice = maxPrice;
                priceSlider.noUiSlider.set([minPrice, maxPrice]);
            }

            if (filterType === "width") {
                filters.minWidth = minWidth;
                filters.maxWidth = maxWidth;
                widthSlider.noUiSlider.set([minWidth, maxWidth]);
            }

            if (filterType === "length") {
                filters.minLength = minLength;
                filters.maxLength = maxLength;
                lengthSlider.noUiSlider.set([minLength, maxLength]);
            }

            if (filterType === "capacity") {
                filters.minCapacity = 0;
                filters.maxCapacity = 0;
            }

            applyFilters();
            updateMetaFilter();
        });

        $("#remove-all,#reset-filter").click(function () {
            // reset price filters
            filters.minPrice = minPrice;
            filters.maxPrice = maxPrice;
            priceSlider.noUiSlider.set([minPrice, maxPrice]);

            // reset width filters
            filters.minWidth = minWidth;
            filters.maxWidth = maxWidth;
            widthSlider.noUiSlider.set([minWidth, maxWidth]);

            // reset length filters
            filters.minLength = minLength;
            filters.maxLength = maxLength;
            lengthSlider.noUiSlider.set([minLength, maxLength]);

            // reset capacity filters
            filters.minCapacity = 0;
            filters.maxCapacity = 0;

            applyFilters();
            updateMetaFilter();
        });

        function applyFilters() {
            let visibleProductCountGrid = 0;
            let visibleProductCountList = 0;

            $(".wrapper-shop .card-product").each(function () {
                const product = $(this);
                let showProduct = true;

                // values to compare
                const priceText = product
                    .find(".current-price")
                    .text()
                    .replace("$", "")
                    .replace(",", "");
                const price = parseFloat(priceText);

                const productMin = product.data("min-capacity");
                const productMax = product.data("max-capacity");
                const width = parseFloat(product.data("width"));
                const length = parseFloat(product.data("length"));

                // price filter
                if (price < filters.minPrice || price > filters.maxPrice) {
                    showProduct = false;
                }

                // width filter
                if (width < filters.minWidth || width > filters.maxWidth) {
                    showProduct = false;
                }

                // length filter
                if (length < filters.minLength || length > filters.maxLength) {
                    showProduct = false;
                }

                const filterMin = filters.minCapacity;
                const filterMax = filters.maxCapacity;

                // console.log(
                //     `Price: ${price}, FilterMinPrice: ${
                //         filters.minPrice
                //     }, FilterMaxPrice: ${filters.maxPrice}, Result: ${
                //         price < filters.minPrice || price > filters.maxPrice
                //     }, CapacitMin: ${filterMin}, CapacityMax: ${filterMax}, CapacityResult: ${
                //         filters.minCapacity == 0 && filters.maxCapacity == 0
                //     }`
                // );

                // if not not capacity filter is selected then show all products
                if (filters.minCapacity == 0 && filters.maxCapacity == 0) {
                    // do nothing, needed this check without this no product show
                    // showProduct = true;
                } else if (Number.isNaN(filters.maxCapacity)) {
                    // If filter maxCapacity is NaN, treat it as open-ended (20+)
                    showProduct = productMin >= 21 || productMax >= 21;
                } else {
                    showProduct =
                        (productMin >= filterMin && productMin <= filterMax) ||
                        (productMax >= filterMin && productMax <= filterMax) ||
                        (productMin <= filterMin && productMax >= filterMax);
                }

                product.toggle(showProduct);

                if (showProduct) {
                    if (product.hasClass("grid")) {
                        visibleProductCountGrid++;
                    } else if (product.hasClass("style-list")) {
                        visibleProductCountList++;
                    }
                }
            });

            $("#product-count-grid").html(
                `<span class="count">${visibleProductCountGrid}</span> Products Found`
            );
            $("#product-count-list").html(
                `<span class="count">${visibleProductCountList}</span> Products Found`
            );
            updateLastVisibleItem();
            if (
                visibleProductCountGrid >= 12 ||
                visibleProductCountList >= 12
            ) {
                $(".wg-pagination,.tf-loading").show();
            } else {
                $(".wg-pagination,.tf-loading").hide();
            }
        }

        function updateLastVisibleItem() {
            setTimeout(() => {
                $(".card-product.style-list").removeClass("last");
                const lastVisible = $(
                    ".card-product.style-list:visible"
                ).last();
                if (lastVisible.length > 0) {
                    lastVisible.addClass("last");
                }
            }, 50);
        }
    };

    /* Filter Sort
  -------------------------------------------------------------------------------------*/
    var filterSort = function () {
        let isListActive = $(".sw-layout-list").hasClass("active");
        let originalProductsList = $("#listLayout .card-product").clone();
        let originalProductsGrid = $("#gridLayout .card-product").clone();
        let paginationList = $("#listLayout .wg-pagination").clone();
        let paginationGrid = $("#gridLayout .wg-pagination").clone();

        $(".select-item").on("click", function () {
            const sortValue = $(this).data("sort-value");
            $(".select-item").removeClass("active");
            $(this).addClass("active");
            $(".text-sort-value").text($(this).find(".text-value-item").text());

            applyFilter(sortValue, isListActive);
        });

        $(".tf-view-layout-switch").on("click", function () {
            const layout = $(this).data("value-layout");

            if (layout === "list") {
                isListActive = true;
                $("#gridLayout").hide();
                $("#listLayout").show();
            } else {
                isListActive = false;
                $("#listLayout").hide();
                setGridLayout(layout);
            }
        });

        function applyFilter(sortValue, isListActive) {
            let products;

            if (isListActive) {
                products = $("#listLayout .card-product");
            } else {
                products = $("#gridLayout .card-product");
            }

            if (sortValue === "best-selling") {
                if (isListActive) {
                    $("#listLayout")
                        .empty()
                        .append(originalProductsList.clone());
                } else {
                    $("#gridLayout")
                        .empty()
                        .append(originalProductsGrid.clone());
                }
                bindProductEvents();
                displayPagination(products, isListActive);
                return;
            }

            if (sortValue === "price-low-high") {
                products.sort(
                    (a, b) =>
                        parseFloat(
                            $(a).find(".current-price").text().replace("$", "")
                        ) -
                        parseFloat(
                            $(b).find(".current-price").text().replace("$", "")
                        )
                );
            } else if (sortValue === "price-high-low") {
                products.sort(
                    (a, b) =>
                        parseFloat(
                            $(b).find(".current-price").text().replace("$", "")
                        ) -
                        parseFloat(
                            $(a).find(".current-price").text().replace("$", "")
                        )
                );
            } else if (sortValue === "a-z") {
                products.sort((a, b) =>
                    $(a)
                        .find(".title")
                        .text()
                        .localeCompare($(b).find(".title").text())
                );
            } else if (sortValue === "z-a") {
                products.sort((a, b) =>
                    $(b)
                        .find(".title")
                        .text()
                        .localeCompare($(a).find(".title").text())
                );
            }

            if (isListActive) {
                $("#listLayout").empty().append(products);
            } else {
                $("#gridLayout").empty().append(products);
            }
            bindProductEvents();
            displayPagination(products, isListActive);
        }

        function displayPagination(products, isListActive) {
            if (products.length >= 12) {
                if (isListActive) {
                    $("#listLayout").append(paginationList.clone());
                } else {
                    $("#gridLayout").append(paginationGrid.clone());
                }
            }
        }

        function setGridLayout(layoutClass) {
            $("#gridLayout")
                .show()
                .removeClass()
                .addClass(`wrapper-shop tf-grid-layout ${layoutClass}`);
            $(".tf-view-layout-switch").removeClass("active");
            $(
                `.tf-view-layout-switch[data-value-layout="${layoutClass}"]`
            ).addClass("active");
        }
        function bindProductEvents() {
            if ($(".card-product").length > 0) {
                $(".color-swatch").on("click, mouseover", function () {
                    var swatchColor = $(this).find("img").attr("src");
                    var imgProduct = $(this)
                        .closest(".card-product")
                        .find(".img-product");
                    imgProduct.attr("src", swatchColor);
                    $(this)
                        .closest(".card-product")
                        .find(".color-swatch.active")
                        .removeClass("active");
                    $(this).addClass("active");
                });
            }
            $(".size-box").on("click", ".size-item", function () {
                $(this)
                    .closest(".size-box")
                    .find(".size-item")
                    .removeClass("active");
                $(this).addClass("active");
            });
        }
        bindProductEvents();
    };

    /* Switch Layout
  -------------------------------------------------------------------------------------*/
    var swLayoutShop = function () {
        let isListActive = $(".sw-layout-list").hasClass("active");
        let userSelectedLayout = null;

        function hasValidLayout() {
            return (
                $("#gridLayout").hasClass("tf-col-2") ||
                $("#gridLayout").hasClass("tf-col-3") ||
                $("#gridLayout").hasClass("tf-col-4") ||
                $("#gridLayout").hasClass("tf-col-5") ||
                $("#gridLayout").hasClass("tf-col-6") ||
                $("#gridLayout").hasClass("tf-col-7")
            );
        }

        function updateLayoutDisplay() {
            const windowWidth = $(window).width();
            const currentLayout = $("#gridLayout").attr("class");

            if (!hasValidLayout()) {
                console.warn(
                    "Page does not contain a valid layout (2-7 columns), skipping layout adjustments."
                );
                return;
            }

            if (isListActive) {
                $("#gridLayout").hide();
                $("#listLayout").show();
                $(".wrapper-control-shop")
                    .addClass("listLayout-wrapper")
                    .removeClass("gridLayout-wrapper");
                return;
            }

            if (userSelectedLayout) {
                if (windowWidth <= 767) {
                    setGridLayout("tf-col-2");
                } else if (
                    windowWidth <= 1200 &&
                    userSelectedLayout !== "tf-col-2"
                ) {
                    setGridLayout("tf-col-3");
                } else if (
                    windowWidth <= 1400 &&
                    (userSelectedLayout === "tf-col-5" ||
                        userSelectedLayout === "tf-col-6" ||
                        userSelectedLayout === "tf-col-7")
                ) {
                    setGridLayout("tf-col-4");
                } else {
                    setGridLayout(userSelectedLayout);
                }
                return;
            }

            if (windowWidth <= 767) {
                if (!currentLayout.includes("tf-col-2")) {
                    setGridLayout("tf-col-2");
                }
            } else if (windowWidth <= 1200) {
                if (!currentLayout.includes("tf-col-3")) {
                    setGridLayout("tf-col-3");
                }
            } else if (windowWidth <= 1400) {
                if (
                    currentLayout.includes("tf-col-5") ||
                    currentLayout.includes("tf-col-6") ||
                    currentLayout.includes("tf-col-7")
                ) {
                    setGridLayout("tf-col-4");
                }
            } else {
                $("#listLayout").hide();
                $("#gridLayout").show();
                $(".wrapper-control-shop")
                    .addClass("gridLayout-wrapper")
                    .removeClass("listLayout-wrapper");
            }

            // set images height equal to width
            setImagesHeight();
        }

        function setGridLayout(layoutClass) {
            $("#listLayout").hide();
            $("#gridLayout")
                .show()
                .removeClass()
                .addClass(`wrapper-shop tf-grid-layout ${layoutClass}`);
            $(".tf-view-layout-switch").removeClass("active");
            $(
                `.tf-view-layout-switch[data-value-layout="${layoutClass}"]`
            ).addClass("active");
            $(".wrapper-control-shop")
                .addClass("gridLayout-wrapper")
                .removeClass("listLayout-wrapper");
            isListActive = false;
        }

        $(document).ready(function () {
            if (isListActive) {
                $("#gridLayout").hide();
                $("#listLayout").show();
                $(".wrapper-control-shop")
                    .addClass("listLayout-wrapper")
                    .removeClass("gridLayout-wrapper");
            } else {
                $("#listLayout").hide();
                $("#gridLayout").show();
                updateLayoutDisplay();
            }
        });

        $(window).on("resize", updateLayoutDisplay);

        $(".tf-view-layout-switch").on("click", function () {
            const layout = $(this).data("value-layout");
            $(".tf-view-layout-switch").removeClass("active");
            $(this).addClass("active");

            if (layout === "list") {
                isListActive = true;
                userSelectedLayout = null;
                $("#gridLayout").hide();
                $("#listLayout").show();
                $(".wrapper-control-shop")
                    .addClass("listLayout-wrapper")
                    .removeClass("gridLayout-wrapper");
            } else {
                userSelectedLayout = layout;
                setGridLayout(layout);
            }

            // set images height equal to width
            setImagesHeight();
        });

        function setImagesHeight() {
            $(".image-wrap").each(function () {
                const width = $(this).width();
                $(this).css("height", width + "px");
            });
        }
    };

    /* Handle Sidebar Filter
  -------------------------------------------------------------------------------------*/
    var handleSidebarFilter = function () {
        $(".filterShop").click(function () {
            if ($(window).width() <= 1200) {
                $(".sidebar-filter,.overlay-filter").addClass("show");
            }
        });
        $(".close-filter ,.overlay-filter").click(function () {
            $(".sidebar-filter,.overlay-filter").removeClass("show");
        });
    };

    /* Handle Dropdown Filter
  -------------------------------------------------------------------------------------*/
    var handleDropdownFilter = function () {
        if (".wrapper-filter-dropdown".length > 0) {
            $(".filterDropdown").click(function (event) {
                event.stopPropagation();
                $(".dropdown-filter").toggleClass("show");
                $(this).toggleClass("active");
                var icon = $(this).find(".icon");
                if ($(this).hasClass("active")) {
                    icon.removeClass("icon-filter").addClass("icon-close");
                } else {
                    icon.removeClass("icon-close").addClass("icon-filter");
                }
                if ($(window).width() <= 1200) {
                    $(".overlay-filter").addClass("show");
                }
            });
            $(document).click(function (event) {
                if (
                    !$(event.target).closest(".wrapper-filter-dropdown").length
                ) {
                    $(".dropdown-filter").removeClass("show");
                    $(".filterDropdown").removeClass("active");
                    $(".filterDropdown .icon")
                        .removeClass("icon-close")
                        .addClass("icon-filter");
                }
            });
            $(".close-filter ,.overlay-filter").click(function () {
                $(".dropdown-filter").removeClass("show");
                $(".filterDropdown").removeClass("active");
                $(".filterDropdown .icon")
                    .removeClass("icon-close")
                    .addClass("icon-filter");
                $(".overlay-filter").removeClass("show");
            });
        }
    };

    $(function () {
        rangeTwoPrice();
        rangeTwoWidth();
        rangeTwoLength();
        filterProducts();
        filterSort();
        swLayoutShop();
        handleSidebarFilter();
        handleDropdownFilter();
    });
})(jQuery);
