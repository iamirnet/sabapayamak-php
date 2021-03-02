<?php

namespace Sabapayamak\Enums;

abstract class ResultStatus extends General {
    const Ok = "با موفقیت ارسال شد";
    const InvalidReciver = "شماره گیرنده نادرست است";
    const InvalidSender = "شماره فرستنده نادرست است";
    const InvalidEncodeing = "پارامتر انکودینگ نامعتبر است";
    const InvalidMClass = "پارامتر mclass نامعتبر است";
    const InvalidUDH = "پارامتر UDH نامعتبر است";
    const InvalidText = "محتویات پیامک خالی است";
    const NoCharge = "مانده اعتبار ریالی مورد نیاز برای ارسال پیامک کافی نیست";
    const ServerBusy = "سرور در هنگام ارسال پیام مشغول بر طرف نمودن ایراد داخلی بوده است";
    const DisabledAccount = "حساب غیر فعال است";
    const ExpireAccount = "حساب منقضی شده است";
    const InvalidUserOrPass ="نام کاربری و یا کلمه عبور نا معتبر است";
    const InvalidRequest = "درخواست معتبر نیست";
    const InvalidSenderError = "شماره فرستنده به حساب تعلق ندارد";
    const AccessFaild = "این سرویس برای حساب فعال نشده است";
    const RetryAgain = "در حال حاضر امکان پردازش درخواست جدید وجود ندارد،لطفا دوباره سعی کنید";
    const InvalidUID = "شناسه پیامک نا معتبر است";
    const InvalidMethod = "نام متد درخواستی معتبر نیست";
    const BlackList = "شماره گیرنده در لیست سیاه اپراتور قرار دارد";
    const PreNumberBlocked = "شماره گیرنده بر اساس پیش شماره در حال حاضر در مگفا مسدود است";
    const InvalidIP = "آدرس IP مبدا، اجازه دسترسی به این سرویس را ندارد";
    const InvalidMessagePart = "تعداد بخش‌های پیامک بیش از حد مجاز استاندارد (۲۶۵ عدد) است";
    const InvalidMessageBodies = "طول آرايه پارامتر messageBodies با طول آرايه گيرندگان تطابق ندارد";
    const InvalidMessageClass = "طول آرايه پارامتر messageClass با طول آرايه گيرندگان تطابق ندارد";
    const InvalidSenderNumbers = "طول آرايه پارامتر senderNumbers با طول آرايه گيرندگان تطابق ندارد";
    const InvalidUDHs = "طول آرايه پارامتر udhs با طول آرايه گيرندگان تطابق ندارد";
    const InvalidPriorities = "طول آرايه پارامتر priorities با طول آرايه گيرندگان تطابق ندارد";
    const InvalidRecipents = "آرايه‌ی گيرندگان خالی است";
    const InvalidParameter = "طول آرايه پارامتر گيرندگان بيشتر از طول مجاز است";
    const InvalidSenders = "آرايه‌ی فرستندگان خالی است";
    const InvalidEncodings = "طول آرايه پارامتر encoding با طول آرايه گيرندگان تطابق ندارد";
    const InvalidCheckingMessageIds = "طول آرايه پارامتر checkingMessageIds با طول آرايه گيرندگان تطابق ندارد";
    const SuccessToken = "کلید امنیتی شما با موفقیت ایجاد شد";
    const NoContent = "داده ای وجود ندارد";
    const Exception ="خطایی اتفاق افتاده است،لطفا با پشتیبانی تماس بگیرید";
    const Unathorize = "کلید امنیتی شما منقضی شده یا  اشتباه است";
    const UserOrPasswordWrong = "نام کاربری یا رمز عبور اشتباه است";
    const DomainWrong = "شما نمیتوانید از طریق این دامنه درخواست بدهید";
    const VnumerWrong = "شماره ارسال اشتباه است";
    const VnumerStatusWrong = "وضعیت شماره ارسال مناسب ارسال نیست";
}

?>