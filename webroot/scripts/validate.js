function validateForm()
                    {
                        var x=document.forms["contactForm"]["data[Contact][name]"].value;
                        var y=document.forms["contactForm"]["data[Contact][diachi]"].value;
                        var z=document.forms["contactForm"]["data[Contact][sodienthoai]"].value;
                        var i=document.forms["contactForm"]["data[Contact][message]"].value;
                        if (x==null || x=="")
                        {
                            alert("Bạn chưa nhập họ tên");
                            return false;
                        }
                        if (y==null || y=="")
                        {
                            alert("Bạn chưa nhập địa chỉ");
                            return false;
                        }
                        if (z==null || z=="")
                        {
                            alert("Bạn chưa nhập số điện thoại");
                            return false;
                        }
                        if (i==null || i=="")
                        {
                            alert("Bạn chưa nhập nội dung");
                            return false;
                        }
                        var a=document.forms["contactForm"]["data[Contact][email]"].value;
                        var atpos=a.indexOf("@");
                        var dotpos=a.lastIndexOf(".");
                        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=a.length)
                        {
                            alert("Định dạng mail không đúng");
                            return false;
                        }
                    }