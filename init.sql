CREATE TABLE public."users" (
     ID SERIAL PRIMARY KEY,
     USERNAME VARCHAR(255),
     PASSWORD VARCHAR(255),
     ROLE VARCHAR(255)
);

CREATE TABLE public."students" (
    CODE VARCHAR(255) PRIMARY KEY,
    USERNAME VARCHAR(255),
    EMAIL VARCHAR(255) UNIQUE,
    DEPARTMENT VARCHAR(255),
    MAJOR VARCHAR(255)
);

INSERT INTO public."students" (code, username, email, department, major) VALUES
('SV215213', 'Trần Phước Anh Quốc', 'anhquoc18092003@gmail.com' ,'Công nghệ phần mềm', 'Kỹ thuật phần mềm'),
('SV215214', 'Trần Phước Long', 'phuoclong18092003@gmail.com', 'Công nghệ phần mềm', 'Kỹ thuật phần mềm'),
('SV215215', 'Lê Thị Thu Hiền', 'thuhien18092003@gmail.com', 'Công nghệ phần mềm', 'Kỹ thuật phần mềm'),
('SV215212', 'Mai Đình Khôi', 'dinhkhoi18092003@gmail.com', 'Công nghệ phần mềm', 'Kỹ thuật phần mềm'),
('SV215218', 'Trần Vương Duy', 'vuongduy18092003@gmail.com', 'Hệ thống thông tin', 'Kỹ thuật máy tính'),
('SV215219', 'Trương Nguyễn Phước Trí', 'phuoctri18092003@gmail.com', 'Thương mại điện tử', 'Khoa học máy tính'),
('SV215210', 'Hồ Thị Thanh Thảo', 'thanhthao18092003@gmail.com', 'Hệ thống thông tin', 'Thương mại điện tử');