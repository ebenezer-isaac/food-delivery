<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h1> RESTUARENT Log</h1>
  <table border="50">
    <tr bgcolor="#3ec5c3">
      	<th style="text-align:centre">id</th>
	 <th style="text-align:centre">name</th>
   	   <th style="text-align:centre">rating</th>
	 <th style="text-align:centre">address</th>
      	<th style="text-align:centre">dishes</th>
     	 <th style="text-align:centre">dish_id</th>
     	 <th style="text-align:centre">dish_name</th>
	<th style="text-align:centre">price</th>
    </tr>
    <xsl:for-each select="res_log/res">
    <tr>
     	 <td><xsl:value-of select="id"/></td>
	<td><xsl:value-of select="name"/></td>
     	 <td><xsl:value-of select="rating"/></td>
	<td><xsl:value-of select="address"/></td>
     	 <td><xsl:value-of select="dishes"/></td>
     	 <td><xsl:value-of select=”dish_id"/></td>
     	 <td><xsl:value-of select="dish_name"/></td>
	<td><xsl:value-of select="price"/></td>
    	  </tr>
    </xsl:for-each>
  </table>
</body>
</html></xsl:template></xsl:stylesheet>