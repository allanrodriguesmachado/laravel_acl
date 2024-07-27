import {Request, Response} from "express";
import {AuthUserServices} from "../../services/user/AuthUserServices";

class AuthUserController {
    async handleAuthUserController(req: Request, res:Response) {
        const {email, password} = req.body;

        const authUserServices = new AuthUserServices();
        const authUser = await authUserServices.execute({email, password});

        return res.json(authUser);
    }
}

export  {AuthUserController}