  <!-- end row -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © JobScout.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Design & Develop by Hamza Naji
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    </div>
    <!-- end container-fluid -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('./assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('./assets/js/pages/jquery.toaster.js') }}"></script>
    <script src="{{ asset('./assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('./assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('./assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('./assets/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ asset('./assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('./assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- jquery.vectormap map -->
    <script src="{{ asset('./assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('./assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

    {{-- <script src="{{ asset('./assets/js/pages/dashboard.init.js') }}"></script> --}}

    <script src="{{ asset('./assets/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
      $(".search").keyup(function () {
        var searchTerm = $(".search").val();
        var listItem = $('.results tbody').children('tr');
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
        
      $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
            return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
      });
        
      $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
        $(this).attr('visible','false');
      });
    
      $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
        $(this).attr('visible','true');
      });
    
      var jobCount = $('.results tbody tr[visible="true"]').length;
        $('.counter').text(jobCount + ' item');
    
      if(jobCount == '0') {$('.no-result').show();}
        else {$('.no-result').hide();}
              });
    });
        </script>

</body>

</html>