USE [HTTT_DungCuHocTap]
GO
/****** Object:  Table [dbo].[baocao]    Script Date: 12/18/2016 2:37:35 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[baocao](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idTaiKhoan] [int] NULL,
	[NgayTao] [smalldatetime] NULL,
	[GhiChu] [nvarchar](255) NULL,
	[idTinhTrang] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[baocao_chitiet]    Script Date: 12/18/2016 2:37:35 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[baocao_chitiet](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idLoai] [int] NULL,
	[idSanPham] [int] NULL,
	[idBC] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
ALTER TABLE [dbo].[baocao] ADD  DEFAULT (NULL) FOR [GhiChu]
GO
ALTER TABLE [dbo].[baocao]  WITH CHECK ADD FOREIGN KEY([idTaiKhoan])
REFERENCES [dbo].[taikhoan] ([id])
GO
ALTER TABLE [dbo].[baocao]  WITH CHECK ADD FOREIGN KEY([idTinhTrang])
REFERENCES [dbo].[tinhtrang] ([id])
GO
ALTER TABLE [dbo].[baocao_chitiet]  WITH CHECK ADD FOREIGN KEY([idLoai])
REFERENCES [dbo].[loaisp] ([id])
GO
ALTER TABLE [dbo].[baocao_chitiet]  WITH CHECK ADD FOREIGN KEY([idSanPham])
REFERENCES [dbo].[sanpham] ([id])
GO
ALTER TABLE [dbo].[baocao_chitiet]  WITH CHECK ADD FOREIGN KEY([idBC])
REFERENCES [dbo].[baocao] ([id])
GO
