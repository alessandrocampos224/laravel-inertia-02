<template>
    <nav aria-label="Page navigation example" v-if="source.last_page > 1">
        <ul class="pagination justify-content-center mt-2">
            <li
                class="page-item prev-item"
                v-if="source.prev_page_url"
            ><call-link class="page-link" :href="source.prev_page_url"></call-link></li>
            <template v-for="(x, i) in pages">
                <li v-if="parseInt(x)" class="page-item" :class="{ 'active': source.current_page === x }" :key="i">
                    <call-link class="page-link"
                               :href="options.redirect_url">{{ x }}
                    </call-link>
                </li>
                <li v-else class="page-item" :key="i">
                    <span class="page-link" >{{ x }}</span>
                </li>
            </template>
            <li class="page-item next-item"
                v-if="source.next_page_url"
            ><call-link class="page-link" :href="source.next_page_url"></call-link></li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "VsxPagination",
        props: ["source","options"],
        data() {
            return {
                pages: []
            };
        },
        watch: {
            source(val) {
                this.startPagination(val)
            }
        },
        created() {
            this.startPagination(this.source);
        },
        methods: {
            startPagination(val){
                this.pages = this.generatePagesArray(
                    val.current_page,
                    val.total,
                    val.per_page,
                    6
                );
            },
            switched(page) {
                if (this.pageIsOutOfBounds(page)) {
                    return;
                }

                this.$emit("switched", {page:page});

                // this.$router.replace({
                //     query: Object.assign({}, this.$route.query, { page: page })
                // });
            },
            pageIsOutOfBounds(page) {
                return page <= 0 || page > this.source.last_page;
            },
            generatePagesArray: function(
                currentPage,
                collectionLength,
                rowsPerPage,
                paginationRange
            ) {
                var pages = [];
                var totalPages = Math.ceil(collectionLength / rowsPerPage);
                var halfWay = Math.ceil(paginationRange / 2);
                var position;

                if (currentPage <= halfWay) {
                    position = "start";
                } else if (totalPages - halfWay < currentPage) {
                    position = "end";
                } else {
                    position = "middle";
                }

                var ellipsesNeeded = paginationRange < totalPages;
                var i = 1;
                while (i <= totalPages && i <= paginationRange) {
                    var pageNumber = this.calculatePageNumber(
                        i,
                        currentPage,
                        paginationRange,
                        totalPages
                    );
                    var openingEllipsesNeeded =
                        i === 2 && (position === "middle" || position === "end");
                    var closingEllipsesNeeded =
                        i === paginationRange - 1 &&
                        (position === "middle" || position === "start");
                    if (
                        ellipsesNeeded &&
                        (openingEllipsesNeeded || closingEllipsesNeeded)
                    ) {
                        pages.push("...");
                    } else {
                        pages.push(pageNumber);
                    }
                    i++;
                }
                return pages;
            },

            calculatePageNumber: function(i, currentPage, paginationRange, totalPages) {
                var halfWay = Math.ceil(paginationRange / 2);
                if (i === paginationRange) {
                    return totalPages;
                } else if (i === 1) {
                    return i;
                } else if (paginationRange < totalPages) {
                    if (totalPages - halfWay < currentPage) {
                        return totalPages - paginationRange + i;
                    } else if (halfWay < currentPage) {
                        return currentPage - halfWay + i;
                    } else {
                        return i;
                    }
                } else {
                    return i;
                }
            }
        }
    }
</script>

<style scoped>

</style>
