USE [HTTT_Dodunghoctap]
GO
/****** Object:  Table [dbo].[tinhtrang]    Script Date: 12/3/2016 2:17:18 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tinhtrang](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[TinhTrang] [nvarchar](255) NULL,
	[TenBang] [varchar](200) NULL,
	[ThuocTinh] [varchar](200) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
